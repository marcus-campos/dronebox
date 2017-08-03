<?php

namespace DroneBox\Http\Controllers;

use DroneBox\Models\Follower;
use DroneBox\Services\FollowerService;
use DroneBox\Services\TimelineService;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * @var TimelineService
     */
    private $timelineService;

    /**
     * TimelineController constructor.
     * @param TimelineService $timelineService
     */
    public function __construct(TimelineService $timelineService)
    {
        $this->timelineService = $timelineService;
    }

    /**
     * @SWG\Get(
     *   path="/timeline/profile/{id}",
     *   summary="Retorna as postagens dos perfils que o perfil segue",
     *   operationId="timeline",
     *   produces={"application/json"},
     *   tags={"Timeline"},
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="Id do profile",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="Successful operation"),
     *   @SWG\Response(response=406, description="Not acceptable"),
     *   @SWG\Response(response=500, description="Internal server error")
     * )
     * @param $id
     * @return bool
     * @internal param Request $request
     * @internal param $id
     */
    public function feed($id)
    {
        return $this->timelineService->feed($id);
    }
}
