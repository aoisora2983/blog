<?php
declare(strict_types=1);

namespace App\Model\Material;

class Stage
{
	private int $id;
	private string $name;
	private ?string $img;
	private int $required;
	private int $stamina;

	public function __construct (
		int $id,
		string $name,
		?string $img,
		int $required,
		int $stamina
	) {
		$this->id = $id;
		$this->name = $name;
		$this->img = $img;
		$this->required = $required;
		$this->stamina = $stamina;
	}

	public function addMaterialNumber(int $val): void {
		$this->required += $val;
	}

	public function toArray(): array {
		return [
			'id' => $this->id,
			'name' => $this->name,
			'img' => $this->img,
			'required' => $this->required,
			'stamina' => $this->stamina,
		];
	}
}
