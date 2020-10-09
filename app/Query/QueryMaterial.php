<?php
declare(strict_types=1);

namespace App\Query;

use DB;
use App\Eloquent\Material;
use App\Eloquent\Skill;
use App\Eloquent\CharacterMaterialPromotion;
use App\Eloquent\CharacterMaterialSkill;
use App\Model\Material\Develop;

class QueryMaterial {

	public function findPromotion(int $characterId, Develop $now, Develop $goal): ?array {
		$query = CharacterMaterialPromotion::select(
			'mst_material.id',
			'mst_material.name',
		);
		$query->selectRaw(
			'SUM(tbl_character_material_promotion.required_number) as required_number'
		);

		$query->join('mst_material', function ($query) {
			$query->on(
				'tbl_character_material_promotion.material_id',
				'=',
				'mst_material.id'
			);
		});

		$query->where('tbl_character_material_promotion.character_id', '=', $characterId);
		$query->where('tbl_character_material_promotion.promotion_id', '>=', $now->getPromotionId());
		$query->where('tbl_character_material_promotion.promotion_id', '<=', $goal->getPromotionId());

		$query->groupBy(
			'mst_material.id',
			'mst_material.name'
		);

		return $query->get()->toArray();
	}

	public function findSkill(int $characterId, Develop $now, Develop $goal): ?array {
		// skill level の現在・目標最大レベルを取得
		$maxNowLevel = $this->getMaxLevel($now->getSkills());
		$maxGoalLevel = $this->getMaxLevel($goal->getSkills());

		// 目標7までは個別ではなく一括で取得(現在が7なら取得しない)
		if ($maxNowLevel <= 7) {
			$query = CharacterMaterialSkill::select(
				'mst_material.id',
				'mst_material.name',
			);
			$query->selectRaw(
				'SUM(tbl_character_material_skill.required_number) as required_number'
			);

		}

		// 7以上があるなら個別で取得
		if ($maxGoalLevel > 7) {

		}

		return [];
	}

	private function getMaxLevel(array $skills) {
		$levelList = Skill::select('level')
			->whereIn('id', $skills)
			->get()
			->toArray();

		$maxLevel = 1;
		foreach($levelList as $item) {
			$maxLevel = max($item['level'], $maxLevel);
		}
	}
}