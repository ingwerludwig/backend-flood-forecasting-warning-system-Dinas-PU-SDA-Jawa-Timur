<?php

namespace App\Services\Impl;

use App\Http\Requests\AddKontakNotifikasiRequest;
use App\Http\Requests\ChangeKontakNotifikasiRequest;
use App\Repository\NotifikasiKontakRepository;
use App\Services\NotifikasiKontakService;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class NotifikasiKontakServiceImpl implements NotifikasiKontakService
{
    protected NotifikasiKontakRepository $notifikasiKontakRepository;

    public function __construct(NotifikasiKontakRepository $notifikasiKontakRepository)
    {
        $this->notifikasiKontakRepository = $notifikasiKontakRepository;
    }
    public function insertKontak(AddKontakNotifikasiRequest $request)
    {
        try
        {
            $req = $request->validated();
            return $this->notifikasiKontakRepository->insertKontak($req);
        }
        catch (Exception $e)
        {
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

    public function changeKontakInfo($request)
    {
        try
        {
            return $this->notifikasiKontakRepository->changeKontakInfo($request);
        }
        catch (Exception $e)
        {
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

    public function getAllKontak(): Collection
    {
        try
        {
            return $this->notifikasiKontakRepository->getAllKontak();
        }
        catch (Exception $e)
        {
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }
}
