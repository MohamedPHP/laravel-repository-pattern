<?php

namespace App\Repositories\Eloquent;

use App\Topic;

use App\Repositories\Contracts\TopicRepository;

use App\Repositories\RepositoryAbstract;

class EloquentTopicRepository extends RepositoryAbstract implements TopicRepository
{
    /**
     * The Repository Entity.
     *
     * @return stdClass
     */
    public function entity()
    {
        return Topic::class;
    }
}
