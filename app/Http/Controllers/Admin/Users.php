<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Users\Store;
use App\Http\Requests\Admin\Users\Update;
use App\Permission;
use App\Role;
use App\User;

use Illuminate\Support\Facades\Hash;

class Users extends AdminController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['roles', 'permissions'];
    }

    protected function append()
    {
        $array = [
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ];

        return $array;
    }

    public function store(Store $request)
    {
        $requestArray = $request->all();
        $requestArray['password'] = Hash::make($requestArray['password']);
        $this->model->create($requestArray);
        return redirect()->route('admin.users.index');
    }

    public function update($id, Update $request)
    {

        $role = Role::FindOrFail($request->role);
        $this->model->FindOrFail($id)->giveRuleTo($role);

        if (isset($request->permissions)){


        $this->model->FindOrFail($id)->givePermissionsTo($request->permissions);
        }
        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        if (isset($requestArray['password']) && request()->get('password') != "") {
            $requestArray['password'] = Hash::make($requestArray['password']);
        } else {
            unset($requestArray['password']);
        }
        $row->update($requestArray);

        return response()->json(['error' => false, 'data' => 'user Updated ']);


//        return redirect()->back();
    }


    protected function filter($rows)
    {
        if (request()->has('name') && request()->get('name') != "") {
            $rows = $rows->where('name', request()->get('name'));
        }
        return $rows;
    }
}
