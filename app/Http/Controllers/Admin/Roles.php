<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\Roles\Store;
use App\Permission;
use App\Role;

class Roles extends AdminController
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }
    protected function with()
    {
        return ['permissions'];
    }
    protected function append()
    {
        $array = [

            'permissions' => Permission::get(),
            'selectedPermissions' => $this->model->permissions(),
        ];

        return $array;
    }

    public function store(Store $request)
    {
        $requestArray =  $request->all();
        $row = $this->model->create($requestArray);

        return redirect()->route('admin.roles.index');
    }

    public function update($id, Store $request)
    {
        if (isset($request->permissions)){


            $this->model->FindOrFail($id)->givePermissionsTo($request->permissions);
        }

        $requestArray = $request->all();
        $row = $this->model->FindOrFail($id);

        $row->update($requestArray);
        return response()->json(['error' => false, 'data' => 'Role Updated ']);


//        return redirect()->back();
    }


}
