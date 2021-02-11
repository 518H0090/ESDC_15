<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chucvu;
use App\Components\ChucvuRecursive;
use Illuminate\Support\Str;

class ChucvuController extends Controller
{
    //khai báo biến
    private $chucvu;

    //constructor
    public function __construct(Chucvu $chucvu){
        $this->chucvu = $chucvu;
    }

    //điều hướng sang trang chức vụ
    public function index(){
        $listchucvu = $this->chucvu->latest()->simplePaginate(5);
        return view('chucvu.index',compact('listchucvu'));
    }

    //chuyển sang trang add
    public function add(){
        //cách cũ
        // $data = $this->chucvu->all();
        // //khởi tạo đối tượng Recursive và gán $data vào
        // $recursive = new ChucvuRecursive($data);
        // $htmlOption = $recursive->Recursive();

        //khi tạo 1 function dùng chung mới
        $htmlOption = $this->getRecursive($parentid = '');
        return view('chucvu.add',compact('htmlOption'));
    }

    //lưu trữ chức vụ
    public function store(Request $request){
        $this->chucvu->create([
            'TenCV'=> $request->TenCV,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('chucvu.index');
    }

    //function dùng chung để xài recursive bên components
    public function getRecursive($parentid){
        $data = $this->chucvu->all();
        //khởi tạo đối tượng Recursive và gán $data vào
        $recursive = new ChucvuRecursive($data);
        $htmlOption = $recursive->Recursive($parentid);
        return $htmlOption;
    }

    //chuyển sang trang edit
    public function edit($id){
        $chucvu = $this->chucvu->find($id);
        $htmlOption = $this->getRecursive($chucvu->parent_id);
        return view('chucvu.edit',compact('chucvu','htmlOption'));
    }

    //lưu trữ chức vụ
    public function update(Request $request,$id){
       $this->chucvu->find($id)->update([
        'TenCV'=> $request->TenCV,
        'parent_id' => $request->parent_id,
       ]);
       return redirect()->route('chucvu.index');
    }

    //xóa chức vụ
    public function delete($id){
        $this->chucvu->where('id',$id)->delete();
        return redirect()->route('chucvu.index');
    }

    
}
