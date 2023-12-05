<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama',
        'email',
        'password',
        'role',
        'no_telp',
        'created_at',
        'updated_at'
    ];

    public static function addAdditionalData(Array $CreateUsersRequest): Array
    {
        $CreateUsersRequest['id'] = Str::uuid()->toString();
        $CreateUsersRequest['role'] = 2;
        $CreateUsersRequest['password'] = Hash::make($CreateUsersRequest['password']);
        $CreateUsersRequest['created_at'] = Carbon::now();
        $CreateUsersRequest['updated_at'] = Carbon::now();

        return $CreateUsersRequest;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
