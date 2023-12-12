<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StasiunHujanPos extends Model
{
    use HasFactory;

    protected $table = 'stasiun_hujan';

    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'nama_pos',
        'batas_hujan_ringan',
        'batas_hujan_sedang',
        'batas_hujan_berat'
    ];
}
