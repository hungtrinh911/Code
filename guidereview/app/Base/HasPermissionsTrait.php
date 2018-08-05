<?php
/**
 * Created by PhpStorm.
 * User: tuannm2
 * Date: 6/10/2018
 * Time: 10:46 PM
 */

namespace App\Base;

use App\Permission;
use App\Role;

trait HasPermissionsTrait
{
    /*
     * Danh sách Role của 1 User
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    /*
     * Danh sách phân quyền của 1 User
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }

    public function hasRole(... $roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    protected function hasPermission($permission)
    {
        return (bool)$this->permissions->where('slug', $permission->slug)->count();
    }

    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function givePermissionsTo(... $permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function deletePermissions(... $permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }
}