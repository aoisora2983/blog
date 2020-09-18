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
				'mst_develop.promotion',
				'mst_develop.skill1',
				'mst_develop.skill2',
				'mst_develop.skill3',
		);

		$query->leftJoin('mst_develop', function($query) {
			$query->on(
				'mst_develop.rarity',
				'=',
				'mst_character.rarity'
			);
		});

		$query->where('mst_character.id', $id);

		return $query->first();
	}
}