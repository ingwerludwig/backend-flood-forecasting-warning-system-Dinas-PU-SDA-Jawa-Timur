<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPrediksiMukaAir extends Model
{
    use HasFactory;

    protected $table = 'history_prediksi_muka_air';

    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'data_awlr_per_jam',
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
