<?php
declare(strict_types=1);

namespace App\Query;

use App\Eloquent\Level;
use DB;

class QueryLevel {
	public function find(array $now, array $goal): ?object {
		// SELECT
		// 	SUM(
		// 		CASE
		//			WHEN promotion_id = now.promotion_id
		//				 AND value =< now.level
		//				THEN 0
		//			WHEN promotion_id = now.promotion_id
		//				 AND value > goal.level
		//				THEN 0
		//			ELSE required_experience
		//		END
		//	) as ex
		// 	SUM(
		// 		CASE
		//			WHEN promotion_id = now.promotion_id
		//				 AND value =< now.level
		//				THEN 0
		//			WHEN promotion_id = now.promotion_id
		//				 AND value > goal.level
		//				THEN 0
		//			ELSE required_money
		//		END
		//	) as money
		// FROM
		//  mst_level
		// WHERE
		//  promotion_id >= now.promotion_id
		//  AND promotion_id <= goal.promotion_id

		$level = Level::selectRaw(
			'SUM(
				CASE
					WHEN promotion_id = ' . $now['promotion'] . '
						AND value <= ' . $now['level'] . '
						THEN 0
					WHEN promotion_id = ' . $goal['promotion'] . '
						AND value > ' . $goal['level'] . '
						THEN 0
					ELSE required_experience
				END
			) as experience',
		)
		->selectRaw(
			'SUM(
				CASE
					WHEN promotion_id = ' . $now['promotion'] . '
						AND value <= ' . $now['level'] . '
						THEN 0
					WHEN promotion_id = ' . $goal['promotion'] . '
						AND value > ' . $goal['level'] . '
						THEN 0
					ELSE required_money
				END
			) as money',
		);

		$level
			->where('promotion_id', '>=', $now['promotion'])
			->where('promotion_id', '<=', $goal['promotion']);

		return $level->first();
	}
}