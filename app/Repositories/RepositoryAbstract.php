<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Support\Collection;

abstract class RepositoryAbstract implements RepositoryInterface
{
    /**
     * The Entity
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
