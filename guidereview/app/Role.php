<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Role extends Model
{
    protected $hidden = array('pivot');

    /*
     * Danh sách phân quyền của 1 role
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }


    /**
     * Danh sách được phân trang
     * @param $locale
     * @param $search
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public static function pagedList($locale, $search, $offset, $limit)
    {
        $list = Role::where('locale', $locale)
            ->where('name', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $list;
    }

    public static function count($locale, $search)
    {
        if ($search != '')
            $count = Role::where('locale', $locale)
                ->where('name', 'like', '%' . $search . '%')
                ->count();
        else
            $count = Role::where('locale', $locale)->count();
        return $count;
    }

    /*
     * Lay du lieu role theo slug
     */
    public static function getRoleBySlug($slug)
    {
        return Role::where('slug', $slug)->get();
    }

    /**
     * @param $slug
     * @param $isUpdatePermission : kiem tra co update permission khong
     */
    public static function canUpdate($slug, $isUpdatePermission)
    {
        $roleSlug = Role::getRoleBySlug($slug);
        if ($roleSlug->isEmpty()) {
            return true;
        } else {
            return $isUpdatePermission == true;
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getAll()
    {
        $roles = DB::table('roles')
            ->selectRaw('roles.id,
                    roles.name,
                    roles.slug as roles_slug,
                    roles.created_at,
                    roles.updated_at,
                    roles.locale_source_id'
            )
            ->join('users_roles', 'users_roles.role_id', '=', 'roles.id')
            ->join('users', 'users.id', '=', 'users_roles.user_id')->get();
        return $roles;
    }

    public static function getAllApi($current_user)
    {
        if ($current_user->id == 1){
            $roles = DB::table('roles')
                ->selectRaw('roles.id,
                    roles.name,
                    roles.slug as roles_slug,
                    roles.created_at,
                    roles.updated_at,
                    roles.locale_source_id'
                )
                ->join('users_roles', 'users_roles.role_id', '=', 'roles.id')
                ->join('users', 'users.id', '=', 'users_roles.user_id')->distinct()->get();
        } else {
            $roles = DB::table('roles')
                ->where('user_id', $current_user->id)
                ->selectRaw('roles.id,
                    roles.name,
                    roles.slug as roles_slug,
                    roles.created_at,
                    roles.updated_at,
                    roles.locale_source_id'
                )
                ->join('users_roles', 'users_roles.role_id', '=', 'roles.id')
                ->join('users', 'users.id', '=', 'users_roles.user_id')->get();
        }

        return $roles;
    }



}
