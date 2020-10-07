<?php

namespace App\Http\Action\Material;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Query\QueryLevel;
use App\Query\QueryMaterial;

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

        $level = $levelQueryService->find($request['now'], $request['goal']);
        $pMaterial = $materialQueryService->findPromotion();
        $sMaterial = $materialQueryService->findSkill();

        return response()->json($level);
    }
}
