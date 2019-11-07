<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug',
    ];
    public function permissions() {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }

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


    protected function getAllPermissions(array $permissions) {
//        dd(Permission::whereIn('id',$permissions)->get());
        return Permission::whereIn('id',$permissions)->get();
    }
}
