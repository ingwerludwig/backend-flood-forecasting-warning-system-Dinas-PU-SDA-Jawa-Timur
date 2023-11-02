<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama',
        'no_telp',
        'created_at',
        'updated_at'
    ];


}
