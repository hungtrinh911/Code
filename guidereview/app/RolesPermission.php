<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolesPermission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'roles_permissions';


    /*
     * lay danh sach permission theo role_id
     */
    public static function get($role_id)
    {
        return RolesPermission::where('role_id', $role_id)->pluck('permission_id');
    }

}
