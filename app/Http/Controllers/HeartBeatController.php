<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Response;

class HeartBeatController extends Controller
{

    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        return Response::json([
            "status"    => true,
            "version"   => "9.41.0"
        ]);
    }

}
