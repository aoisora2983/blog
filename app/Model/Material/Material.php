<?php
declare(strict_types=1);

namespace App\Model\Material;

class Material
{
	const EX_ID = 1;
	const MO_ID = 2;

	private int $id;
	private string $name;
	private ?string $img;
	private int $required;

	public function __construct (
		int $id,
		string $name,
		?string $img,
		int $required
	) {
		$this->id = $id;
		$this->name = $name;
		$this->img = $img;
		$this->required = $required;
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
		];
	}
}
