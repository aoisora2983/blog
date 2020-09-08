<?php

namespace App\Http\Action\Character;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\SystemParameter\Job;

class GetJobListAction
{
    /**
     * ジョブを取得
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
		$job = Job::JOB;

        return response()->json($job);
    }
}
