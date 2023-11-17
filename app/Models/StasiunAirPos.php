<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StasiunAirPos extends Model
{
    use HasFactory;

    protected $table = 'stasiun_air';

    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'nama_pos',
        'batas_air_siaga',
        'batas_air_awas'
    ];
}
