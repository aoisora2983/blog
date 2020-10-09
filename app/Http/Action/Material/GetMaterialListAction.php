<?php

namespace App\Http\Action\Material;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Query\QueryLevel;
use App\Query\QueryMaterial;
use App\Model\Material\Develop;

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

            $level = $levelQueryService->find($now, $goal);
            $promotionMaterial = $materialQueryService->findPromotion($characterId, $now, $goal);
            $skillMaterial = $materialQueryService->findSkill($characterId, $now, $goal);

            return response()->json(
                [
                    'level' => $level,
                    'promotion' => $promotionMaterial,
                    'skill' => $skillMaterial
                ]
            );
        }
    }
}
