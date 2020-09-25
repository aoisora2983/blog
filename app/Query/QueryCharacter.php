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

	public function findPromotionById(int $rarity): ?object {
        $query = DB::table('mst_develop');

		$query->select(
				'mst_develop.name',
		)
		->where('mst_develop.rarity', '>', $rarity);

		return $query->first();
	}

}