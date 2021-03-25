<?php

namespace App\Http\Controllers;

use App\Components\ListItem;
use App\Components\Recursive;
use App\Http\Requests\DepartmentJoinRequest;
use App\Models\Department;
use App\Models\Department_Join;
use App\Models\Employee;
use App\Models\Regency;
use Illuminate\Http\Request;

class DepartmentJoinController extends Controller
{
    //
    private $deparment;
    private $employee;
    private $regency;
    private $deparmentjoin;

    public function __construct(Department $department,Employee $employee,Regency $regency,Department_Join $deparmentjoin){
        $this->deparment = $department;
        $this->employee = $employee;
        $this->regency = $regency;
        $this->deparmentjoin = $deparmentjoin;
    }

    public function index(){
        $departmentjoin = $this->deparmentjoin->latest()->paginate(5);
        return view('departmentjoin.index',compact('departmentjoin'));
    }

    public function getDeparment($id){
        $department = $this->deparment->all();
        $listitem = new ListItem($department);
        $departmentoption = $listitem->getAll($id);
        return $departmentoption;
    }

    public function getEmployee($id){
        $emloyee = $this->employee->all();
        $listitem = new ListItem($emloyee);
        $emloyeeoption = $listitem->getAll($id);
        return $emloyeeoption;
    }

    public function add(){
        $department = $this->getDeparment($id='');
        $employee = $this->getEmployee($id='');
        return view('departmentjoin.add',compact('department','employee'));
    }

    public function store(DepartmentJoinRequest $request){
        $this->deparmentjoin->create($request->all());
        return redirect()->route('departmentjoin.index');
    }

    public function delete($id){
        $this->deparmentjoin->find($id)->delete();
        return redirect()->route('departmentjoin.index');
    }

    public function edit($id){
        $departmentjoin = $this->deparmentjoin->find($id);
        $department = $this->getDeparment($departmentjoin->department_id);
        $employee = $this->getEmployee($departmentjoin->employee_id);
        return view('departmentjoin.edit',compact('department','employee','departmentjoin'));
    }

    public function update($id,DepartmentJoinRequest $request){
        $this->deparmentjoin->find($id)->update($request->all());
        return redirect()->route('departmentjoin.index');
    }
}
