<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataARR extends Model
{
    use HasFactory;

    protected $table = 'data_arr_per_jam';

    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'nama_stasiun',
        'curah_hujan',
        'tanggal'
    ];
}
