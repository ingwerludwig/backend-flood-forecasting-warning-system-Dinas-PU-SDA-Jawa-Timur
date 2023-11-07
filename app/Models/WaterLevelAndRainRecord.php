<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterLevelAndRainRecord extends Model
{
    use HasFactory;

    protected $table = 'awlr_arr_per_jam';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'level_muka_air_purwodadi',
        'level_muka_air_dhompo',
        'curah_hujan_cendono',
        'curah_hujan_lawang',
        'tanggal'
    ];
}
