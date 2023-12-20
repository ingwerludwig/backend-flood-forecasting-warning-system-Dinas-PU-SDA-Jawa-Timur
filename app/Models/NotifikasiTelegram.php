<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiTelegram extends Model
{
    use HasFactory;

    protected $table = 'notification_telegram';

    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'user_id',
        'chat_id'
    ];
}
