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

        $item = $query->findById($request->id);

        $character = new Character(
            $item->id,
            $item->name,
            $item->img,
            $item->rarity,
            $item->job,
            $item->promotion ? (array)json_decode($item->promotion) : null,
            array (
                'skill1'=>$item->skill1 ? (array)json_decode($item->skill1) : null,
                'skill2'=>$item->skill2 ? (array)json_decode($item->skill2) : null,
                'skill3'=>$item->skill3 ? (array)json_decode($item->skill3) : null,
            )
        );

        return response()->json(
            $character->toArray()
        );
    }
}
