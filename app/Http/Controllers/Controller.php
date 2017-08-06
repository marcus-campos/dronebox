<?php

namespace DroneBox\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    //TODO: DDD
    /**
     * @SWG\Swagger(
     *   schemes={"http"},
     *   basePath="/api",
     *   @SWG\Info(
     *     version="0.0.1",
     *     title="SocialBox",
     *     description="Esta é uma documentação simples SocialBox.",
     *     @SWG\Contact(
     *       email="campos.v.marcus@gmail.com"
     *     ),
     *     @SWG\License(
     *       name="Apache 2.0",
     *       url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *     )
     *   )
     * )
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
