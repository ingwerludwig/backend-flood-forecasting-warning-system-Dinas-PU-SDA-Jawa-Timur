<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiKontak extends Model
{
    use HasFactory;

    protected $table = 'notification_contact';

    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'nama_kontak',
        'no_telp'
    ];
}
