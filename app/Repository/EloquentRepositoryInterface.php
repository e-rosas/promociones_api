<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Interface EloquentRepositoryInterface.
 */
interface EloquentRepositoryInterface
{
    public function create(array $attributes): Model;

    /**
     * @param $id
     *
     * @return Model
     */
    public function find($id): ?Model;

    public function get(): ?Collection;

    public function paginate(Request $request): ?Collection;

    public function store(Request $request): ?Model;

    public function update($id, Request $request): ?Model;

    public function show($id): ?Model;

    public function delete($id): ?Model;
}
