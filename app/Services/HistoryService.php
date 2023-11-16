<?php

namespace App\Services;

interface HistoryService
{
    public function getHistory($offsetReq, $limitReq);

    public function getHistoryPrediction($offset, $limit);
}
