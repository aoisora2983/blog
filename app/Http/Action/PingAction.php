<?php

namespace App\Http\Action;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PingAction
{
    /**
     * ping
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        return response()->json(['message' => 'ok']);
    }
}
