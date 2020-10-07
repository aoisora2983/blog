<?php
declare(strict_types=1);

namespace App\Model\Material;

class Develop
{
	private ?int $promotionId;
	private int $level;
	private ?array $skills;

	public function __construct (
		?int $promotionId,
		int $level,
		?array $skills
	) {
		$this->promotionId = $promotionId;
		$this->level = $level;
		$this->skills = $skills;
	}

	public function getPromotionId(): ?int {
		return $this->promotionId;
	}

	public function getLevel(): int {
		return $this->level;
	}

	public function getSkills(): ?array {
		return $this->skills;
	}

	public function toArray(): array {
		return [
			'promotion_id' => $this->getPromotionId(),
			'level' => $this->getLevel(),
			'skills' => $this->getSkills(),
		];
	}
}
