<?php

namespace App\Http\Action\Character;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetDevelopListAction
{
    /**
     * を取得
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
		$rarity = Rarity::RARITY;

        return response()->json($rarity);
    }
}
