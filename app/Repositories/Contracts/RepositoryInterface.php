<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface RepositoryInterface
{
    public function all() : Collection;

    public function find(int $id) : Model;

    public function findMany(array $ids) : Collection;

    public function findWhere(string $column, string $value) : Collection;

    public function findWhereFirst(string $column, string $value) : Model;

    public function paginate(int $limit = 10) : LengthAwarePaginator;

    public function create(array $data) : Model;

    public function update(int $id, array $data) : bool;

    public function delete(int $id) : bool;
}
