<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class UsersRole extends Model
{
    use HasFactory;

    protected $table = 'users_role';

    public $incrementing = true;

    protected $fillable = [
        'role_name',
        'created_at',
        'updated_at'
    ];

    /**
     * @param array $CreateRoleRequest
     * @return array
     */
    public static function addAdditionalData(array $CreateRoleRequest): array
    {
        $CreateRoleRequest['created_at'] = Carbon::now();
        $CreateRoleRequest['updated_at'] = Carbon::now();

        return $CreateRoleRequest;
    }
}
