<?php

namespace App\Repository;

use App\Models\HistoryPrediksiMukaAir;
use App\Models\WaterLevelAndRainRecord;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class HistoryRepository
{
    public function getHistory($offsetReq, $limitReq): array
    {
        $dataQuery =  WaterLevelAndRainRecord::orderBy('id', 'desc')
            ->offset($offsetReq)
            ->limit($limitReq);
        $data = $dataQuery->get();
        $totalCount = $dataQuery->toBase()->getCountForPagination();
        return [
            'history' => $data,
            'total_count' => $totalCount,
        ];
    }


    public function getHistoryPrediction($offset, $limit): array
    {
        $commonTableExpression = DB::table('hasil_prediksi')->orderBy('hasil_prediksi.id', 'desc');

        $data = clone $commonTableExpression;
        $data = $data->offset($offset)
            ->limit($limit)
            ->get();

        $totalCount = clone $commonTableExpression;
        $totalCount = $totalCount->count();

        return [
            'history' => $data,
            'total_count' => $totalCount,
        ];
    }

    public function getChartHistory($model, $daerah, $periode): array
    {
        $requestedCol = "prediksi_level_muka_air_" . $daerah . "_" . $model;
        $actualCol = "level_muka_air_" . $daerah;
        $dataActual =  DB::table('awlr_arr_per_jam')->select('id',$actualCol,'tanggal')->orderBy('awlr_arr_per_jam.tanggal', 'desc')->limit(24)->get()->reverse()->values();
        $latestActualData = $dataActual[0]->tanggal;

        $dataPrediction = DB::table('hasil_prediksi')
            ->select('id', $requestedCol, 'predicted_for_time')
            ->where('hasil_prediksi.predicted_for_time', '>=', $latestActualData)
            ->orderBy('hasil_prediksi.predicted_for_time', 'asc')
            ->limit($periode+24)
            ->get();

        $dataActual = $dataActual->map(function ($item) use ($actualCol) {
            return [
                'id' => $item->id,
                'nilai' => $item->$actualCol,
                'tanggal' => $item->tanggal,
            ];
        });

        $dataPrediction = $dataPrediction->map(function ($item) use ($requestedCol) {
            return [
                'id' => $item->id,
                'nilai' => $item->$requestedCol,
                'tanggal' => $item->predicted_for_time,
            ];
        });

        return [
            'aktual' => $dataActual,
            'prediksi' => $dataPrediction
        ];
    }
}
