<?php

namespace App\Http\Controllers;

use App\Http\Response\Response;
use App\Services\HistoryService;
use Illuminate\Http\JsonResponse;

class HistoryController extends Controller
{
    protected HistoryService $historyService;

    public function __construct(HistoryService $historyService)
    {
        $this->historyService = $historyService;
    }

    public function getHistory(): JsonResponse
    {
        $result = $this->historyService->getHistory();
        return response()->json((Response::success($result,'Get All History successfully',200)));
    }

    public function getHistoryPrediction(): JsonResponse
    {
        $result = $this->historyService->getHistoryPrediction();
        return response()->json((Response::success($result,'Get All History successfully',200)));
    }
}
