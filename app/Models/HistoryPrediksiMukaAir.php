<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPrediksiMukaAir extends Model
{
    use HasFactory;

    protected $table = 'hasil_prediksi';

    public $incrementing = true;

    protected $fillable = [
        'prediksi_level_muka_air_purwodadi_lstm',
        'prediksi_level_muka_air_purwodadi_gru',
        'prediksi_level_muka_air_purwodadi_tcn',
        'prediksi_level_muka_air_dhompo_lstm',
        'prediksi_level_muka_air_dhompo_gru',
        'prediksi_level_muka_air_dhompo_tcn',
        'id_awlr_arr_per_jam',
        'status_muka_air',
        'created_at',
        'updated_at'
    ];

    /**
     * @param array $CreateHistoryPrediksiRequest
     * @return array
     */
    public static function addAdditionalData(array $CreateHistoryPrediksiRequest): array
    {
        $CreateHistoryPrediksiRequest['created_at'] = Carbon::now();
        $CreateHistoryPrediksiRequest['updated_at'] = Carbon::now();

        return $CreateHistoryPrediksiRequest;
    }
}
