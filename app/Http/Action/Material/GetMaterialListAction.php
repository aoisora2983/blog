<?php

namespace App\Http\Action\Material;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Query\QueryCharacter;

class GetMaterialListAction
{
    /**
     * キャラクターを取得
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {

        return response()->json($request);
    }
}
