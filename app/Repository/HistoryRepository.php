<?php

namespace App\Repository;

use App\Models\WaterLevelAndRainRecord;
use Illuminate\Support\Facades\DB;

class HistoryRepository
{
    public function getHistory($offsetReq, $limitReq, $daerah): array
    {
        if($daerah=="lawang")
        {
            $dataQuery =  WaterLevelAndRainRecord::select('id','curah_hujan_lawang','tanggal')
                ->orderBy('id', 'desc')
                ->offset($offsetReq)
                ->limit($limitReq);
        }
        else if($daerah=="cendono")
        {
            $dataQuery =  WaterLevelAndRainRecord::select('id','curah_hujan_cendono','tanggal')
                ->orderBy('id', 'desc')
                ->offset($offsetReq)
                ->limit($limitReq);
        }
        else if($daerah=="purwodadi")
        {
            $dataQuery =  WaterLevelAndRainRecord::select('id','level_muka_air_purwodadi','tanggal')
                ->orderBy('id', 'desc')
                ->offset($offsetReq)
                ->limit($limitReq);
        }
        else if($daerah=="dhompo")
        {
            $dataQuery =  WaterLevelAndRainRecord::select('id','level_muka_air_dhompo','tanggal')
                ->orderBy('id', 'desc')
                ->offset($offsetReq)
                ->limit($limitReq);
        }
        else
        {
            return [
                'history' => null,
                'total_count' => 0,
            ];
        }

        $data = $dataQuery->get();
        $totalCount = $dataQuery->toBase()->getCountForPagination();
        return [
            'history' => $data,
            'total_count' => $totalCount,
        ];
    }


    public function getHistoryPrediction($offset, $limit): array
    {
        $commonTableExpression = DB::table('hasil_prediksi')
            ->orderBy('hasil_prediksi.id', 'desc');

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

        $dataActual =  DB::table('awlr_arr_per_jam')
            ->select('id',$actualCol,'tanggal')
            ->orderBy('awlr_arr_per_jam.tanggal', 'desc')
            ->limit(1)
            ->get();
        $latestActualData = $dataActual[0]->tanggal;

        $dataPrediction = DB::table('hasil_prediksi')
            ->select( DB::raw("$requestedCol as prediksi") , DB::raw("predicted_for_time as tanggal"))
            ->where('hasil_prediksi.predicted_for_time', '>', $latestActualData)
            ->orderBy('hasil_prediksi.predicted_for_time', 'asc')
            ->limit($periode)
            ->get();
        $predictionPrevious = DB::table('hasil_prediksi')
            ->select( DB::raw("$requestedCol as prediksi") , DB::raw("predicted_for_time as tanggal"))
            ->where('hasil_prediksi.predicted_for_time', '<=', $latestActualData)
            ->orderBy('hasil_prediksi.predicted_for_time', 'desc')
            ->limit(24-$periode-1)
            ->get()
            ->reverse()->values();

        $dataPredictionForChart = $predictionPrevious->merge($dataPrediction);

        $dataActual =  DB::table('awlr_arr_per_jam')
            ->select(DB::raw("$actualCol as aktual"),'tanggal')
            ->where('awlr_arr_per_jam.tanggal', '<=', $latestActualData)
            ->orderBy('awlr_arr_per_jam.tanggal', 'desc')
            ->limit(24-$periode)
            ->get()
            ->reverse()->values();

        $joinedData = collect();

        foreach ($dataActual as $actualItem) {
            $joinedItem = [
                'aktual' => $actualItem->aktual,
                'prediksi' => null,
                'tanggal' => $actualItem->tanggal,
            ];

            $matchingPrediction = $dataPredictionForChart->firstWhere('tanggal', $actualItem->tanggal);

            if ($matchingPrediction) {
                $joinedItem['prediksi'] = $matchingPrediction->prediksi;
            }

            $joinedData->push($joinedItem);
        }

        foreach ($dataPredictionForChart as $predictionItem) {
            $existingItem = $joinedData->firstWhere('tanggal', $predictionItem->tanggal);

            if (!$existingItem) {
                $joinedData->push([
                    'aktual' => null,
                    'prediksi' => $predictionItem->prediksi,
                    'tanggal' => $predictionItem->tanggal,
                ]);
            }
        }

        $joinedData = $joinedData->sortBy('tanggal')->values();

        return $joinedData->toArray();
    }
}
