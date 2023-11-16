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
        $commonTableExpression = DB::table('hasil_prediksi')
            ->join('awlr_arr_per_jam', 'hasil_prediksi.id_awlr_arr_per_jam', '=', 'awlr_arr_per_jam.id')
            ->select('hasil_prediksi.*', 'awlr_arr_per_jam.tanggal')
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
}
