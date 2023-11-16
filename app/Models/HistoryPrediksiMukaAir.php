<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPrediksiMukaAir extends Model
{
    use HasFactory;

    protected $table = 'hasil_prediksi';

    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'prediksi_level_muka_air_purwodadi_lstm',
        'prediksi_level_muka_air_purwodadi_gru',
        'prediksi_level_muka_air_purwodadi_tcn',
        'prediksi_level_muka_air_dhompo_lstm',
        'prediksi_level_muka_air_dhompo_gru',
        'prediksi_level_muka_air_dhompo_tcn',
        'predicted_from_time',
        'predicted_for_time',
    ];

}
