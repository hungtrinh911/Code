<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permission extends Model
{
    protected $hidden = array('pivot');

    public function users() {
        return $this->belongsToMany('\App\User', 'users_permissions');
    }

    /*
     * Danh sách Role của 1 Permission
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }

    public function menuItem() {
        return $this->hasOne(MenuItem::class,'thing_id', 'id');
    }

    /**
     * @param $isRoot
     * @param int $parentId
     * @return \Illuminate\Support\Collection
     */
    public static function getAll($isRoot, $parentId = 0){

        $permissions =  DB::table('permissions')
            ->selectRaw('permissions.id,
                    permissions.name,
                    permissions.slug as permission_slug,
                    permissions.thing_id,
                    permissions.locale,
                    things.status,
                    things.type,
                    things.metadata,
                    things.order_index,
                    things.parent_id')
            ->join('things', 'permissions.thing_id', '=', 'things.id');

        if (  $isRoot  )
            $permissions = $permissions
                ->where([
                    ['things.parent_id', 0],
                    ['things.locale', 'vi'],
                ]);
        else
        {
            $permissions = $permissions
                ->where([
                    ['things.parent_id', $parentId],
                    ['things.locale', 'vi'],
                ]);
        }

        return $permissions = $permissions->orderBy('order_index')->get();
    }

}
