<?php

namespace App\Services\Impl;

use App\Repository\StasiunAirPosRepository;
use App\Services\StasiunAirPosService;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class StasiunAirPosServiceImpl implements StasiunAirPosService
{
    protected StasiunAirPosRepository $stasiunAirPosRepository;

    public function __construct(StasiunAirPosRepository $stasiunAirPosRepository)
    {
        $this->stasiunAirPosRepository = $stasiunAirPosRepository;
    }

    public function changeBatas($request)
    {
        try
        {
            return $this->stasiunAirPosRepository->changeBatas($request);
        }
        catch (Exception $e)
        {
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

    public function getStasiunInformation($request)
    {
        try
        {
            return $this->stasiunAirPosRepository->getStasiunInformation($request);
        }
        catch (Exception $e)
        {
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }
}
