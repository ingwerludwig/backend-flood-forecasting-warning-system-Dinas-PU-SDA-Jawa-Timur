<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddKontakNotifikasiRequest;
use App\Http\Requests\ChangeKontakNotifikasiRequest;
use App\Http\Response\Response;
use App\Services\NotifikasiKontakService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotifikasiKontakController extends Controller
{
    protected NotifikasiKontakService $notifikasiKontakService;

    public function __construct(NotifikasiKontakService $notifikasiKontakService)
    {
        $this->notifikasiKontakService = $notifikasiKontakService;
    }

    public function createKontak(AddKontakNotifikasiRequest $request): JsonResponse
    {
        $result = $this->notifikasiKontakService->insertKontak($request);
        return response()->json(Response::success($result, 'Kontak added successfully', 200));
    }

    public function changeKontakInfo(ChangeKontakNotifikasiRequest $request): JsonResponse
    {
        $result = $this->notifikasiKontakService->changeKontakInfo($request);
        return response()->json(Response::success($result, 'Kontak changed successfully', 200));
    }

    public function getAllKontak(): JsonResponse
    {
        $result = $this->notifikasiKontakService->getAllKontak();
        return response()->json(Response::success($result, 'Get All Kontak successfully', 200));
    }
}
