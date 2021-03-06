<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Http\Requests\ThirdPartyInterfaces\V1\LogRequest;
use App\Models\MimeLog;
use App\Http\Controllers\Controller;

/**
 * Class LogController
 * @package App\Http\Controllers\ThirdPartyInterfaces\V1
 */
class LogController extends Controller
{

    /**
     * @param LogRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(LogRequest $request)
    {
        MimeLog::create([
            'action' => $request->input('action'),
            'phone' => $request->input('phone'),
            'data' => \GuzzleHttp\json_decode($request->input('data'))
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'success'
        ]);
    }
}
