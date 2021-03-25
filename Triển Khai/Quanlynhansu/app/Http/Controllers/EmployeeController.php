<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class EmployeeController extends Controller
{
    //
    private $employee;
    private $regency;

    public function __construct(Employee $employee,Regency $regency){
        $this->employee = $employee;
        $this->regency = $regency;
    }

    public function index(){
        $Employee = $this->employee->latest()->paginate(5);
        return view('employee.index',compact('Employee'));
    }

    public function getRecursive($parentid){
        $regency = $this->regency->all();
        $recursive = new Recursive($regency);
        $htmlOption = $recursive->AllRecursive($parentid);
        return $htmlOption;
    }

    public function add(){
        $htmlOption = $this->getRecursive($parentid = '');
        return view('employee.add',compact('htmlOption'));
    }

    public function store(EmployeeRequest $request){

        if($request->hasFile('image_employee')){
            $file = $request->file('image_employee');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('public/avatars',$filename);
            $filepath = Storage::url($path);

            $datainsert = [
                'name' => $request->name,
                'phone' => $request->phone,
                'id_regency' => $request->id_regency,
                'image_employee' => $filepath,
                'file_name' => $filename,
            ];

            $this->employee->create($datainsert);
        }
        else{
            echo "đã xảy ra lỗi";
        }
        return redirect()->route('employee.index');

    }

    public function delete($id){
        $employeedelete = $this->employee->find($id);
        // File::delete(public_path('storage/avatars/'. $employeedelete->file_name));
        $employeedelete->delete();
        return redirect()->route('employee.index');
    }

    public function edit($id){
        $employee = $this->employee->find($id);
        $htmlOption = $this->getRecursive($employee->id_regency);
        return view('employee.edit',compact('employee','htmlOption'));
    }

    public function update($id,EmployeeRequest $request){
        if($request->hasFile('image_employee')){
            $file = $request->file('image_employee');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('public/avatars',$filename);
            $filepath = Storage::url($path);

            $employee = $this->employee->find($id);

            $employee->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'id_regency' => $request->id_regency,
                'image_employee' => $filepath,
                'file_name' => $filename,

            ]);
            // File::delete(public_path('storage/avatars/'. $request->image_name));
        }
        else{
            $employee = $this->employee->find($id);
            $employee->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'id_regency' => $request->id_regency,
                'image_employee' => $request->image_path,
                'file_name' => $request->image_name,

            ]);
        }

        return redirect()->route('employee.index');
    }
}
