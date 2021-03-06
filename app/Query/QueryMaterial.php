<?php
declare(strict_types=1);

namespace App\Query;

use DB;
use App\Eloquent\Material;
use App\Eloquent\Skill;
use App\Eloquent\CharacterMaterialPromotion;
use App\Eloquent\CommonSkill;
use App\Eloquent\SpeciallySkill;
use App\Model\Material\Develop;

class QueryMaterial {
	const COMMON_SKILL_MAX_LEVEL = 7;

	public function findPromotion(int $characterId, Develop $now, Develop $goal): ?array {
		$query = CharacterMaterialPromotion::select(
			'mst_material.id',
			'mst_material.name',
			'mst_material.img',
		);
		$query->selectRaw(
			'SUM(tbl_character_material_promotion.required_number) as required'
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
		// skill level の現在最小・目標最大レベルを取得
		$minNowLevel = $this->getMinLevel($now->getSkills());
		$maxGoalLevel = $this->getMaxLevel($goal->getSkills());
		$result = [];

		// 目標n ~ 7までは個別ではなく一括で取得(現在の最小値が7以上なら取得しない)
		if ($minNowLevel <= self::COMMON_SKILL_MAX_LEVEL) {
			$query = CommonSkill::select(
				'mst_material.id',
				'mst_material.name',
				'mst_material.img',
			);
			$query->selectRaw('SUM(tbl_common_skill.required_number) as required');

			$query->join('mst_material', function ($query) {
				$query->on(
					'tbl_common_skill.material_id',
					'=',
					'mst_material.id'
				);
			});

			$query->where('tbl_common_skill.level', '>', $minNowLevel);
			$query->where('tbl_common_skill.level', '<=', min($maxGoalLevel, self::COMMON_SKILL_MAX_LEVEL));

			$query->groupBy(
				'mst_material.id',
				'mst_material.name',
				'mst_material.img',
			);

			$result = array_merge($query->get()->toArray(), $result);
		}

		// 目標が7以上があるなら個別で取得
		if ($maxGoalLevel > self::COMMON_SKILL_MAX_LEVEL) {
			$query = SpeciallySkill::select(
				'mst_material.id',
				'mst_material.name',
				'mst_material.img',
			);
			$query->selectRaw('SUM(tbl_specially_skill.required_number) as required');

			$query->join('mst_material', function ($query) {
				$query->on(
					'tbl_specially_skill.material_id',
					'=',
					'mst_material.id'
				);
			});

			foreach($now as $kind => $level) {
				$query->orWhere(function($query) {
					$query->where('tbl_specially_skill.level', '>', $level);
					$query->where('tbl_specially_skill.level', '<=', $goal[$kind]);
					$query->where('tbl_specially_skill.kind', '=', $kind);
				});
			}

			$query->groupBy(
				'mst_material.id',
				'mst_material.name',
				'mst_material.img',
			);

			$result = array_merge($query->get()->toArray(), $result);
		}

		return $result;
	}

	private function getMinLevel(array $levels): int {
		$minLevel = 1;
		foreach ($levels as $level) {
			if (!$level) {
				continue;
			}
			$minLevel = min($level, $minLevel);
		}
		return $minLevel;
	}

	private function getMaxLevel(array $levels): int {
		$maxLevel = 1;
		foreach ($levels as $level) {
			if (!$level) {
				continue;
			}
			$maxLevel = max($level, $maxLevel);
		}
		return $maxLevel;
	}

	// 最高効率の素材IDとステージを取得
	public function getEfficientMaterial(int $materialId): ?array {
		// SELECT (tsm.drop_number * tsm.chance / 10) FROM tbl_stage_material tsm JOIN mst_stage ms ON ms.id = tsm.material_id WHERE tsm.material_id = 1 GROUP BY tsm.stage_id ;

		// 下位素材リストを作成
		$array = [];
		$query = Material::select(
			'child_material_id1',
			'child_required_number1',
			'child_material_id2',
			'child_required_number2',
			'child_material_id3',
			'child_required_number3',
		);
		$query->where('id', '=', $materialId);

		return null;
	}
}