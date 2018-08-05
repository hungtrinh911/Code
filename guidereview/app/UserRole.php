<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'users_roles';

    public $timestamps = false;

    /*
     * lay danh sach permission theo role_id
     */
    public static function get($user_id)
    {
        return UserRole::where('user_id', $user_id)->pluck('role_id');
    }
}
