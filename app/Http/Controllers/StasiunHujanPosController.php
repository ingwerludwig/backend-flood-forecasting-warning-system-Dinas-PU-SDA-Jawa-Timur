<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeBatasHujanStasiunRequest;
use App\Http\Response\Response;
use App\Services\StasiunPosHujanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StasiunHujanPosController extends Controller
{
    protected StasiunPosHujanService $stasiunHujanPosService;

    public function __construct(StasiunPosHujanService $stasiunHujanPosService)
    {
        $this->stasiunHujanPosService = $stasiunHujanPosService;
    }

    public function changeBatas(ChangeBatasHujanStasiunRequest $request): JsonResponse
    {
        $result = $this->stasiunHujanPosService->changeBatas($request);
        return response()->json(Response::success($result, 'Batas hujan changed successfully', 200));
    }

    public function getStasiunInformation(Request $request): JsonResponse
    {
        $result = $this->stasiunHujanPosService->getStasiunInformation($request);
        return response()->json(Response::success($result, 'Get Stasiun Hujan information successfully', 200));
    }



}
