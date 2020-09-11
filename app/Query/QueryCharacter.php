<?php

namespace App\Query;

use App\Eloquent\Character;

class QueryCharacter {

	public function findAll(): ?array {
		return Character::select('*')->get()->toArray();
	}

	public function findById(int $id): ?array {
		return Character::select('*')
			->where('id', $id)
			->get()
			->toArray();
	}
}