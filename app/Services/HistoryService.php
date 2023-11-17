<?php

namespace App\Services;

interface HistoryService
{
    public function getHistory($offsetReq, $limitReq);

    public function getHistoryPrediction($offset, $limit);

    public function getChartHistory($model, $daerah, $periode);
}
