<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;
use App\Repositories\Contracts\TopicRepository;

class TopicController extends Controller
{

    /**
     * @var TopicRepository
     */
    protected $topicRepository;

    /**
     * @param TopicRepository $topicRepository
     */
    public function __construct(TopicRepository $topicRepository)
    {
        $this->topicRepository = $topicRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->topicRepository->all();
    }
}
