<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;


abstract class RepositoryAbstract implements RepositoryInterface
{
    /**
     * The Entity.
     *
     * @var Model
     */
    protected $entity;

    /**
     * Fill The Entity Prop.
     */
    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    /**
     * Get All Records From Spescfied Entity.
     *
     * @return Collection
     */
    public function all() : Collection
    {
        return $this->entity->all();
    }

    /**
     * Find Entity By ID.
     *
     * @param  int   $id
     * @return Model
     */
    public function find(int $id) : Model
    {
        return $this->entity->find($id);
    }

    /**
     * Find Many Entities By ID's.
     *
     * @param  array      $ids
     * @return Collection
     */
    public function findMany(array $ids) : Collection
    {
        return $this->entity->findMany($ids);
    }

    /**
     * Find $column Where Equals $value.
     *
     * @param  string     $column
     * @param  string     $value
     * @return Collection
     */
    public function findWhere(string $column, string $value) : Collection
    {
        return $this->entity->where($column, $value)->get();
    }

    /**
     * Find $column Where Equals $value then get the first value.
     *
     * @param  string $column
     * @param  string $value
     * @return Model
     */
    public function findWhereFirst(string $column, string $value) : Model
    {
        return $this->entity->where($column, $value)->first();
    }

    /**
     * Paginate.
     *
     * @param  integer   $limit
     * @return Paginator
     */
    public function paginate(int $limit = 10) : LengthAwarePaginator
    {
        return $this->entity->paginate($limit);
    }

    /**
     * Create New Entity.
     *
     * @param  array $data
     * @return Model
     */
    public function create(array $data) : Model
    {
        return $this->entity->create($data);
    }

    /**
     * Update Entity.
     *
     * @param  integer $id
     * @param  array   $data
     * @return boolean
     */
    public function update(int $id, array $data) : bool
    {
        return $this->find($id)->update($data);
    }

    /**
     * Delete Entity.
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id) : bool
    {
        return $this->find($id)->delete();
    }

    /**
     * Resolve Entity.
     *
     * @return Model
     */
    public function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new \Exception("No Entity Defined");
        }

        return app()->make($this->entity());
    }
}
