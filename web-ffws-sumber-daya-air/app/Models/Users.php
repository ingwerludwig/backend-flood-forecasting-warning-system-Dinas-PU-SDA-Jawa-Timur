<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'email',
        'password',
        'role',
        'no_telp',
        'created_at',
        'updated_at'
    ];

    /**
     * @param array $CreateUsersRequest
     * @return Array
     */
    public static function addAdditionalData(Array $CreateUsersRequest): Array
    {
        $CreateUsersRequest['id'] = Str::uuid()->toString();
        $CreateUsersRequest['password'] = Hash::make($CreateUsersRequest['password']);
        $CreateUsersRequest['created_at'] = Carbon::now();
        $CreateUsersRequest['updated_at'] = Carbon::now();

        return $CreateUsersRequest;
    }
}
