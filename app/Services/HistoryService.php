<?php

namespace App\Services;

interface HistoryService
{
    public function getHistory($offsetReq, $limitReq, $daerah);
    public function getHistoryPrediction($offset, $limit);
    public function getChartHistory($model, $daerah, $periode);
}
