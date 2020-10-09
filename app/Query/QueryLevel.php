<?php
declare(strict_types=1);

namespace App\Query;

use DB;
use App\Eloquent\Level;
use App\Model\Material\Develop;

class QueryLevel {
	public function find(Develop $now, Develop $goal): ?object {
		// もっといい方法ありそう
		$level = Level::selectRaw(
			'SUM(
				CASE
					WHEN promotion_id = ' . $now->getPromotionId() . '
						AND value <= ' . $now->getLevel() . '
						THEN 0
					WHEN promotion_id = ' . $goal->getPromotionId() . '
						AND value > ' . $goal->getLevel() . '
						THEN 0
					ELSE required_experience
				END
			) as experience',
		)
		->selectRaw(
			'SUM(
				CASE
					WHEN promotion_id = ' . $now->getPromotionId() . '
						AND value <= ' . $now->getLevel() . '
						THEN 0
					WHEN promotion_id = ' . $goal->getPromotionId() . '
						AND value > ' . $goal->getLevel() . '
						THEN 0
					ELSE required_money
				END
			) as money',
		);

		$level
			->where('promotion_id', '>=', $now->getPromotionId())
			->where('promotion_id', '<=', $goal->getPromotionId());

		return $level->first();
	}
}