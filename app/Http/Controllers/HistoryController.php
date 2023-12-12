<?php

namespace App\Http\Controllers;

use App\Http\Response\Response;
use App\Services\HistoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    protected HistoryService $historyService;

    public function __construct(HistoryService $historyService)
    {
        $this->historyService = $historyService;
    }

    public function getHistory(Request $request): JsonResponse
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $daerah = $request->input('daerah');
        $result = $this->historyService->getHistory($offset, $limit, $daerah);
        return response()->json((Response::success($result,'Get All History successfully',200)));
    }

    public function getHistoryPrediction(Request $request): JsonResponse
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $result = $this->historyService->getHistoryPrediction($offset, $limit);
        return response()->json((Response::success($result,'Get All History successfully',200)));
    }

    public function getChartData(Request $request): JsonResponse
    {
        $model = $request->input('model');
        $daerah = $request->input('daerah');
        $periode = $request->input('periode');
        $result = $this->historyService->getChartHistory($model, $daerah, $periode);
        return response()->json((Response::success($result,'Get last 24 hours data and next requested hour\'s prediction successfully',200)));
    }
}
