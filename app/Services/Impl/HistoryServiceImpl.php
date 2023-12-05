<?php

namespace App\Services\Impl;

use App\Repository\HistoryRepository;
use App\Services\HistoryService;
use Illuminate\Support\Facades\Log;

class HistoryServiceImpl implements HistoryService
{
    protected HistoryRepository $historyRepository;

    public function __construct(HistoryRepository $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }

    public function getHistory($offsetReq, $limitReq): array
    {
        try {
            return $this->historyRepository->getHistory($offsetReq, $limitReq);
        }
        catch (Exception $e){
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

    public function getHistoryPrediction($offset, $limit): array
    {
        try {
            return $this->historyRepository->getHistoryPrediction($offset, $limit);
        }
        catch (Exception $e){
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

    public function getChartHistory($model, $daerah, $periode): array
    {
        try {
            return $this->historyRepository->getChartHistory($model, $daerah, $periode);
        }
        catch (Exception $e){
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }
}
