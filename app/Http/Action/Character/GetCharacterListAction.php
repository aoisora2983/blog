<?php

namespace App\Http\Action\Character;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Query\QueryCharacter;

class GetCharacterListAction
{
    /**
     * キャラクターを取得
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $character = resolve(QueryCharacter::class);

        $characterList = $character->findAll();

        return response()->json($characterList);
    }
}
