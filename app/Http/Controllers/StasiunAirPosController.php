<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeBatasAirStasiunRequest;
use App\Http\Response\Response;
use App\Services\StasiunAirPosService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StasiunAirPosController extends Controller
{
    protected StasiunAirPosService $stasiunAirPosService;

    public function __construct(StasiunAirPosService $stasiunAirPosService)
    {
        $this->stasiunAirPosService = $stasiunAirPosService;
    }

    public function changeBatas(ChangeBatasAirStasiunRequest $request): JsonResponse
    {
        $result = $this->stasiunAirPosService->changeBatas($request);
        return response()->json(Response::success($result, 'Batas air changed successfully', 200));
    }

    public function getStasiunInformation(Request $request): JsonResponse
    {
        $result = $this->stasiunAirPosService->getStasiunInformation($request);
        return response()->json(Response::success($result, 'Get Stasiun air information successfully', 200));
    }


}
