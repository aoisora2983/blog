<?php
declare(strict_types=1);

namespace App\Model\Character;

class Character
{
	private int $id;
	private string $name;
	private string $img;
	private int $rarity;
	private int $job;
	private ?array $promotion;
	private array $skill;

	public function __construct (
		int $id,
		string $name,
		string $img,
		int $rarity,
		int $job,
		?array $promotion,
		array $skill
	) {
		$this->id = $id;
		$this->name = $name;
		$this->img = $img;
		$this->rarity = $rarity;
		$this->job = $job;
		$this->promotion = $promotion;
		$this->skill = $skill;
	}

	public function toArray(): array {
		return [
			'id' => $this->id,
			'name' => $this->name,
			'img' => $this->img,
			'rarity' => $this->rarity,
			'job' => $this->job,
			'promotion' => $this->promotion,
			'skill' => $this->skill,
		];
	}
}
