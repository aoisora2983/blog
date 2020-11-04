<?php

namespace App\Http\Action\Stage;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Model\Material\Material;
use App\Query\QueryMaterial;

class GetStageListAction
{
    /**
     * を取得
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $materialList = $request->materialList;

        // 一個あたりの効率が良い素材に分解してマージ
        $materialQueryService = resolve(QueryMaterial::class);

        $efficientMaterialList = [];
        foreach($materialList as $material) {
            echo var_dump($material);
            $efficientMaterial = $materialQueryService->getEfficientMaterial($material['id']);
            $efficientMaterialList[$material['id']]['require_number'] += $material['required'];
            // $efficientMaterialList[$material['id']]['require_lap'] += ceil($material['required'] / $efficientMaterial['num']);
            // $efficientMaterialList[$material['id']]['stamina'] += ceil($efficientMaterial['stamina']);
        }

        return response()->json(
            []
        );
    }
}
