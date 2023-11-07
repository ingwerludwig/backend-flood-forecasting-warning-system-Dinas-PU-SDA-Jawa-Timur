<?php

namespace App\Repository;

use App\Models\HistoryPrediksiMukaAir;
use App\Models\WaterLevelAndRainRecord;
use Illuminate\Database\Eloquent\Collection;

class HistoryRepository
{
    public function getHistory(): Collection
    {
        return WaterLevelAndRainRecord::all()->except('id');
    }


    public function getHistoryPrediction(): Collection
    {
        return HistoryPrediksiMukaAir::all()->except('id');
    }
}
