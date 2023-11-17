<?php

namespace App\Services\Impl;

use App\Repository\StasiunAirPosRepository;
use App\Services\StasiunAirPosService;
use Illuminate\Http\Request;

class StasiunAirPosServiceImpl implements StasiunAirPosService
{
    protected StasiunAirPosRepository $stasiunAirPosRepository;

    public function __construct(StasiunAirPosRepository $stasiunAirPosRepository)
    {
        $this->stasiunAirPosRepository = $stasiunAirPosRepository;
    }

    public function changeBatas($request)
    {
        try {
            return $this->stasiunAirPosRepository->changeBatas($request);
        }
        catch (Exception $e){
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

    public function getAllStasiun()
    {
        try {
            return $this->stasiunAirPosRepository->getAllStasiun();
        }
        catch (Exception $e){
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }
}
