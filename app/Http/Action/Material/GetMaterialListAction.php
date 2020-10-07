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

        $characterId = $request['characterId'];
        $now = new Develop(
            $request['now']['promotion'],
            $request['now']['level'],
            $request['now']['skill'],
        );
        $goal = new Develop(
            $request['goal']['promotion'],
            $request['goal']['level'],
            $request['goal']['skill'],
        );

        $level = $levelQueryService->find($now, $goal);
        $pMaterial = $materialQueryService->findPromotion();
        $sMaterial = $materialQueryService->findSkill();

        return response()->json($level);
    }
}
