<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AdminController Extends Controller
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $rows = $this->model;
        $rows = $this->filter($rows);
        $with = $this->with();
        if(!empty($with)){
            $rows = $rows->with($with);
        }
        $rows = $rows->paginate(10);
        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $pageTitle = "Control ".$moduleName;
        $pageDesc = "Here You Can add,edit,delete ".$moduleName;
        $routeName = $this->getClassNameFromModel();

        return view('admin.'.$this->getClassNameFromModel().'.index',compact(
            'rows',
            'moduleName',
            'sModuleName',
            'pageTitle',
            'pageDesc',
            'routeName'
        ));

    }
    public function create(){

        $moduleName = $this->getModelName();
        $pageTitle = "Create ".$moduleName;
        $pageDesc = "Here You Can add ".$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();

        return view('admin.'.$folderName.'.create',compact(
            'moduleName',
            'pageTitle',
            'pageDesc',
            'folderName',
            'routeName'
        ))->with($append);
    }
    public function edit($id){
        $row = $this->model->FindOrFail($id);
        if(!empty($with)){
            $row = $row->with($with);
        }
        $moduleName = $this->getModelName();
        $pageTitle = "Edit ".$moduleName;
        $pageDesc = "Here You Can edit ".$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();

        return view('admin.'.$folderName.'.edit',compact(
            'row',
            'moduleName',
            'pageTitle',
            'pageDesc',
            'folderName',
            'routeName'
        ))->with($append);

    }
    public function destroy($id){
        $this->model->FindOrFail($id)->delete();
        return redirect()->route('admin.'.$this->getClassNameFromModel().'.index');
    }



    protected function getClassNameFromModel(){
        return strtolower($this->pluralModelName());
    }
    protected function pluralModelName(){
        return Str::plural($this->getModelName());
    }
    protected function getModelName(){
        return class_basename($this->model);
    }


    protected function filter($rows){
        return $rows;
    }
    protected function with(){
        return [];
    }
    protected function append(){
        return [];
    }
}
