<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Models\BasicSalary;
use App\Models\Regency;
use Illuminate\Http\Request;

class BasicSalaryController extends Controller
{
    //

    private $regency;
    private $basicsalary;

    public function __construct(Regency $regency,BasicSalary $basicSalary){
        $this->regency = $regency;
        $this->basicsalary = $basicSalary;
    }

    public function index(){
        $basicsalary = $this->basicsalary->latest()->paginate(5);
        return view('basicsalary.index',compact('basicsalary'));
    }

    public function add(){
        $htmlOption = $this->getRecursive($parentid = '');
        return view('basicsalary.add',compact('htmlOption'));
    }

    public function getRecursive($parentid){
        $regency = $this->regency->all();
        $recursive = new Recursive($regency);
        $htmlOption = $recursive->AllRecursive($parentid);
        return $htmlOption;
    }

    public function store(Request $request){
        $this->basicsalary->create($request->all());
        return redirect()->route('basicsalary.index');
    }

    public function delete($id){
        $this->basicsalary->find($id)->delete();
        return redirect()->route('basicsalary.index');
    }

    public function edit($id){
        $salary = $this->basicsalary->find($id);
        $htmlOption = $this->getRecursive($salary->id_regency);
        return view('basicsalary.edit',compact('salary','htmlOption'));
    }

    public function update(Request $request,$id){
        $this->basicsalary->find($id)->update([
            'id_regency' => $request->id_regency,
            'salary' => $request->salary
        ]);
        return redirect()->route('basicsalary.index');
    }
}
