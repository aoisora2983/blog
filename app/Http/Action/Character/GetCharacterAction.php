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
            explode(',', $item->promotion),
            array (
                'skill1'=>$item->skill1 ? explode(',', $item->skill1) : null,
                'skill2'=>$item->skill2 ? explode(',', $item->skill2) : null,
                'skill3'=>$item->skill3 ? explode(',', $item->skill3) : null,
            )
        );

        return response()->json(
            $character->toArray()
        );
    }
}
