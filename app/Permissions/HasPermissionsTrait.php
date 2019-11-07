<?php


namespace App\Permissions;


use App\Permission;
use App\Role;

trait HasPermissionsTrait
{
    public function roles() {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class,'users_permissions');

    }

    public function hasRole( ... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    public function hasPermissionTo($permission) {
//        dd($this->hasPermission($permission));
        return $this->hasPermissionThroughRole($permission) || $this->hasPermissionz($permission);
    }

    public function hasPermissionz($permission) {
//        dd($this->permissions->where('slug',  str_replace('.','-',$permission))->count());
        return (bool) $this->permissions->where('slug', str_replace('.','-',$permission))->count();
    }

    public function hasPermissionThroughRole($permission) {
        $permission1 = Permission::where('slug',str_replace('.','-',$permission))->with('roles')->first();
//        dd($permission1->roles);
        foreach ($permission1->roles as $role){
//            dump($this->roles()->get());
//            dd($role);
            if($this->roles()->get()->contains($role)) {
                return true;
            }
        }
        return false;
    }
    //grant permissions to user
    public function givePermissionsTo(... $permissions) {
        $permissions = $this->getAllPermissions($permissions[0]);
//        dd($permissions);
        if($permissions === null) {
            return $this;
        }
        $this->permissions()->detach();

        $this->permissions()->saveMany($permissions);
        return $this;

    }
    //delete permissions from user
    public function deletePermissions( ... $permissions ) {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }
    public function giveRuleTo($role) {
        if($role === null) {
            return $this;
        }
        $this->roles()->detach($role);

        $this->roles()->save($role);
        return $this;
    }

    protected function getAllPermissions(array $permissions) {
//        dd(Permission::whereIn('id',$permissions)->get());
        return Permission::whereIn('id',$permissions)->get();
    }

}
