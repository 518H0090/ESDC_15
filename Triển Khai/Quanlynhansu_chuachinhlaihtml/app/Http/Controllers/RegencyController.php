<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Http\Requests\RegencyRequest;
use App\Models\Regency;
use Illuminate\Http\Request;

class RegencyController extends Controller
{
    private $regency;

    public function __construct(Regency $regency){
        $this->regency = $regency;
    }

    public function index(){
        $regencys = $this->regency->latest()->paginate(5);
        return view('regency.index',compact('regencys'));
    }

    public function add(){
        $htmlOption = $this->getRecursive($parentid = '');
        return view('regency.add',compact('htmlOption'));
    }

    public function getRecursive($parentid){
        $regency = $this->regency->all();
        $recursive = new Recursive($regency);
        $htmlOption = $recursive->AllRecursive($parentid);
        return $htmlOption;
    }

    public function store(RegencyRequest $request){
        $regency = $request->all();
        $this->regency->create($regency);
        return redirect()->route('regency.index');
    }

    public function delete($id){
        $this->regency->find($id)->delete();
        return redirect()->route('regency.index');
    }

    public function edit($id){
        $regency = $this->regency->find($id);
        $htmlOption = $this->getRecursive($regency->parent_id);
        return view('regency.edit',compact('regency','htmlOption'));
    }

    public function update(RegencyRequest $request,$id){
        $this->regency->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'basic_money' => $request->basic_money,
        ]);
        return redirect()->route('regency.index');
    }
}
