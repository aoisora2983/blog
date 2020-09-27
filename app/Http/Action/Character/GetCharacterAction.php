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
        $queryService = resolve(QueryCharacter::class);

        $character = $queryService->findById($request->id);
        $promotion = $queryService->findPromotionByRarity($character->rarity);
        $skills = $queryService->findSkillByRarity($character->rarity);

        $skillList = array();
        foreach ($skills as $skill) {
            $skillList[$skill->kind][] = $skill;
        }

        $result = new Character(
            $character->id,
            $character->name,
            $character->img,
            $character->rarity,
            $character->job,
            $promotion ?? null,
            $skillList ?? null,
        );

        return response()->json(
            $result->toArray()
        );
    }
}
