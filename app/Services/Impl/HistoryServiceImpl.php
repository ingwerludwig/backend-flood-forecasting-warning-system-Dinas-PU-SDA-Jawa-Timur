<?php

namespace App\Services\Impl;

use App\Repository\HistoryRepository;
use App\Services\HistoryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class HistoryServiceImpl implements HistoryService
{
    protected HistoryRepository $historyRepository;

    public function __construct(HistoryRepository $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }

    public function getHistory(): Collection
    {
        try {
            return $this->historyRepository->getHistory();
        }
        catch (Exception $e){
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new \RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

    public function getHistoryPrediction(): Collection
    {
        try {
            return $this->historyRepository->getHistoryPrediction();
        }
        catch (Exception $e){
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new \RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }
}
