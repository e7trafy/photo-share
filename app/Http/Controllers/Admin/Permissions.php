<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Permissions\Store;
use App\Permission;
use Illuminate\Support\Facades\Route;
class Permissions extends AdminController
{
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request)
    {

        $requestArray =  $request->all();
        $row = $this->model->create($requestArray);

        return redirect()->route('admin.permissions.index');
    }

    public function update($id, Store $request)
    {
        $requestArray = $request->all();
        $row = $this->model->FindOrFail($id);

        $row->update($requestArray);

        return response()->json(['error' => false, 'data' => 'Permission Updated ']);

//        return redirect()->back();
    }

    public function routeFetch(){
        $routes = collect(Route::getRoutes())->reduce(function ($carry = [], $route) {

            if (isset($route->action["as"])){
                $str = str_replace('.',' ', $route->action["as"]);
                $carry[] = $str;
            }

            return $carry;
        });
        foreach ($routes as $key => $route ){
            $permissions[$key] =  Permission::firstOrCreate(['name'=>$route,'slug'=>str_slug($route)]);
        }

        return response()->json(['error' =>false,'data'=>$permissions]);

    }
}
