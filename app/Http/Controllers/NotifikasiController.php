<?php

namespace App\Http\Controllers;

use App\Http\Response\Response;
use App\Services\NotifikasiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    protected NotifikasiService $notifikasiService;

    public function __construct(NotifikasiService $notifikasiService)
    {
        $this->notifikasiService = $notifikasiService;
    }

    public function handleStartCommand(Request $request): JsonResponse
    {
        $result = $this->notifikasiService->handleStart($request);
        return response()->json(Response::success($result, 'Polling successfully', 200));
    }
}
