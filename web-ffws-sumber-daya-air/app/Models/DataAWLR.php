<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAWLR extends Model
{
    use HasFactory;

    protected $table = 'data_awlr_per_jam';
    public $incrementing = true;

    protected $fillable = [
        'nama_stasiun',
        'level_muka_air',
        'elevasi_muka_air',
        'tanggal'
    ];
}
