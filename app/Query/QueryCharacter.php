<?php
declare(strict_types=1);

namespace App\Query;

use App\Eloquent\Character;
use DB;

class QueryCharacter {

	public function findAll(): ?array {
		return Character::select('*')->get()->toArray();
	}

	public function findById(int $id): ?object {
        $query = DB::table('mst_character');

		$query->select(
			'mst_character.id',
			'mst_character.name',
			'mst_character.img',
			'mst_character.rarity',
			'mst_character.job',
		)
		->where('mst_character.id', $id);

		return $query->first();
	}

	public function findPromotionByRarity(int $rarity): ?array {
        $query = DB::table('mst_promotion');

		$query->select(
			'mst_promotion.id',
			'mst_promotion.name',
		)
		->selectRaw(
			'MAX(mst_level.value) as max'
		);

		$query->leftJoin('mst_level', function ($query) {
			$query->on(
				'mst_promotion.id',
				'=',
				'mst_level.promotion_id'
			);
		});

		$query->where('mst_promotion.rarity', '<=', $rarity);
		$query->where('mst_level.rarity', '<=', $rarity);

		$query->groupBy(
			'mst_promotion.id',
			'mst_promotion.name',
		);

		return $query->get()->toArray();
	}

	public function findSkillByRarity(int $rarity): ?array {
        $query = DB::table('mst_skill');

		$query->select(
			'mst_skill.id',
			'mst_skill.kind',
			'mst_skill.name',
		);

		$query->where('mst_skill.rarity', '<=', $rarity);

		return $query->get()->toArray();
	}
}