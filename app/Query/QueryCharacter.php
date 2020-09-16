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
				'mst_character.job'
		)
		->selectRaw(
			'GROUP_CONCAT(
				CASE mst_develop.group_id
					WHEN 1 THEN mst_develop.name
					ELSE null
			 	END
			 ) as promotion'
		)
		->selectRaw(
			'GROUP_CONCAT(
				CASE mst_develop.group_id
					WHEN 2 THEN mst_develop.name
					ELSE null
			 	END
			 ) as skill1'
		)
		->selectRaw(
			'GROUP_CONCAT(
				CASE mst_develop.group_id
					WHEN 3 THEN mst_develop.name
					ELSE null
			 	END
			 ) as skill2'
		)
		->selectRaw(
			'GROUP_CONCAT(
				CASE mst_develop.group_id
					WHEN 4 THEN mst_develop.name
					ELSE null
			 	END
			 ) as skill3'
		);

		$query->leftJoin('mst_develop', function($query) {
			$query->on(
				'mst_develop.rarity',
				'<=',
				'mst_character.rarity'
			);
		});

		$query->where('mst_character.id', $id)
			->groupBy(
				'mst_character.id',
				'mst_character.name',
				'mst_character.img',
				'mst_character.rarity',
				'mst_character.job'
			);

		return $query->first();
	}
}