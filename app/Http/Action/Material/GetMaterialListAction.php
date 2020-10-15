<?php

namespace App\Http\Action\Material;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Query\QueryLevel;
use App\Query\QueryMaterial;
use App\Model\Material\Develop;
use App\Model\Material\Material;

class GetMaterialListAction
{
    /**
     * キャラクターを取得
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $levelQueryService = resolve(QueryLevel::class);
        $materialQueryService = resolve(QueryMaterial::class);

        $developList = $request['developList'];

        foreach ($developList as $item) {
            $characterId = $item['characterId'];
            $develop = $item['develop'];

            $now = new Develop(
                $develop['now']['promotion'],
                $develop['now']['level'],
                $develop['now']['skill'],
            );
            $goal = new Develop(
                $develop['goal']['promotion'],
                $develop['goal']['level'],
                $develop['goal']['skill'],
            );

            $materialList = [];
            // TODO: もっといい方法に修正したい
            $level = $levelQueryService->find($now, $goal);
            $ex = new Material(
                    Material::EX_ID,
                    Material::EX_ID,
                    Material::EX_ID,
                    $level['experience'],
            );
            $mo = new Material(
                    Material::MO_ID,
                    Material::MO_ID,
                    Material::MO_ID,
                    $level['money'],
            );

            $materialList = [$ex->toArray(), $mo->toArray()];
            $promotionMaterial = $materialQueryService->findPromotion($characterId, $now, $goal);
            $skillMaterial = $materialQueryService->findSkill($characterId, $now, $goal);

            $result = $this->mergeMaterials(array_merge($materialList, $promotionMaterial, $skillMaterial));

            return response()->json(
                array_map(
                    function($e) { return $e->toArray(); },
                    $result
                )
            );
        }
    }

    // 各素材の合計値を出す
    private function mergeMaterials($materialList): array {
        $array = [];
        foreach($materialList as $material) {
            if (isset($array[$material['id']])) {
                $array[$material['id']]->addMaterialNumber($material['required']);
            } else {
                $array[$material['id']] = new Material(
                    $material['id'],
                    $material['name'],
                    $material['img'],
                    $material['required'],
                );
            }
        }

        return array_values($array);
    }
}
