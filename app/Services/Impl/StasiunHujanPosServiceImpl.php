<?php

namespace App\Services\Impl;

use App\Repository\StasiunHujanPosRepository;
use App\Services\StasiunPosHujanService;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class StasiunHujanPosServiceImpl implements StasiunPosHujanService
{
    protected StasiunHujanPosRepository $stasiunHujanPosRepository;

    public function __construct(StasiunHujanPosRepository $stasiunHujanPosRepository)
    {
        $this->stasiunHujanPosRepository = $stasiunHujanPosRepository;
    }

    public function changeBatas($request)
    {
        try
        {
            return $this->stasiunHujanPosRepository->changeBatas($request);
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
            return $this->stasiunHujanPosRepository->getStasiunInformation($request);
        }
        catch (Exception $e)
        {
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }
}
