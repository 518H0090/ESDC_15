<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    private $department;

    public function __construct(Department $department){
        $this->department = $department;
    }

    //list
    public function index(){
        $deparmentlist = $this->department->latest()->paginate(5);
        return view('department.index',compact('deparmentlist'));
    }

    //add page
    public function add(){
        return view('department.add');
    }

    //store
    public function store(DepartmentRequest $request){
        $department = $request->validated();
        Department::create($department);
        return redirect()->route('department.index');
    }

    //edit
    public function edit($id){
        $department = $this->department->find($id);
        return view('department.edit',compact('department'));
    }
    //update
    public function update($id,DepartmentRequest $request){
        $department = $request->validated();
        $this->department->find($id)->update($department);
        return redirect()->route('department.index');
    }

    //delete
    public function delete($id){
        $this->department->find($id)->delete();
        return redirect()->route('department.index');
    }
}
