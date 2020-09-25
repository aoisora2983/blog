<?php

namespace App\Http\Action\Character;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Query\QueryCharacter;
use App\Model\Character\Character;

class GetCharacterAction
{
    /**
     * キャラクターを取得
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $query = resolve(QueryCharacter::class);

        $character = $query->findById($request->id);
        $promotion = $query->findPromotionById($character->rarity);

        $result = new Character(
            $character->id,
            $character->name,
            $character->img,
            $character->rarity,
            $character->job,
            $character->promotion ? (array)json_decode($item->promotion) : null,
            array (
                'skill1'=>$item->skill1 ? (array)json_decode($item->skill1) : null,
                'skill2'=>$item->skill2 ? (array)json_decode($item->skill2) : null,
                'skill3'=>$item->skill3 ? (array)json_decode($item->skill3) : null,
            )
        );

        return response()->json(
            $result->toArray()
        );
    }
}
