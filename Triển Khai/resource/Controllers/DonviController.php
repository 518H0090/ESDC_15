<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donvi;
use Illuminate\Support\Str;
// use App\Components\DonviList;

class DonviController extends Controller
{
    //khai báo biến
    private $donvi;

    //constructor
    public function __construct(Donvi $donvi){
        $this->donvi = $donvi;
    }

    //list
    public function index(){
        $donvi = new Donvi;
        $listdonvi = $donvi->latest()->simplePaginate(10);
        return view('donvi.index',compact('listdonvi'));
    }

    //add
    public function add(){
        return view('donvi.add');
    }

    //store
    public function store(Request $request){
        $donvi = new Donvi;
        $donvi->tendv = $request->tendv;
        $donvi->save();
        return redirect()->route('donvi.index');
    }

    //edit
    public function edit($id){
        $donvi = new Donvi;
        $donvi = $donvi->find($id);
        return view('donvi.edit',compact('donvi'));
    }

    //update
    public function update(Request $request,$id){
        $this->donvi->find($id)->update([
            'tendv'=> $request->tendv,
           ]);
        return redirect()->route('donvi.index');
    }

    //delete
    public function delete($id){
        $this->donvi->find($id)->delete();
        return redirect()->route('donvi.index');
    }

    //getAll
    public function DonviList(){
        $data = $this->donvi->all();
        //khởi tạo đối tượng Recursive và gán $data vào
        $DonviList = new DonviList($data);
        $htmlOption = $DonviList->ListDonvi();
        return $htmlOption;
    }

    // //list
    // public function list(){

    //     //khi tạo 1 function dùng chung mới
    //     $htmlOption = $this->DonviList();
    //     return view('donvi.danhsachdonvi',compact('htmlOption'));
    // }
}
