<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chucvu;
use App\Models\BangLuong;
use App\Components\ChucvuList; // cách 1
use App\Components\ChucvuRecursive; // cách 2

class BangluongController extends Controller
{
    //
    private $chucvu;
    private $bangluong;

    public function __construct(Chucvu $chucvu,BangLuong $bangluong){
       $this->chucvu = $chucvu;
       $this->bangluong = $bangluong;
    }

    public function index(){
        $listluong = $this->bangluong->latest()->simplePaginate(10);
        return view('bangluong.index',compact('listluong'));
    }

    //cách 1 : lấy theo dạng list nếu không có dữ liệu con thì nên dùng
    public function ChucvuList(){
        $data = $this->chucvu->all();
        //khởi tạo đối tượng Recursive và gán $data vào
        $ChucvuList = new ChucvuList($data);
        $htmlOption = $ChucvuList->Chucvu();
        return $htmlOption;
    }

    public function add(){
        $htmlOption = $this->ChucvuList();
        return view('bangluong.add',compact('htmlOption'));
    }
    
    // //cách 2 : lấy theo đệ quy danh mục giành cho dữ liệu có các danh mục con theo sau
    // public function getRecursive($parentid){
    //     $data = $this->chucvu->all();
    //     //khởi tạo đối tượng Recursive và gán $data vào
    //     $recursive = new ChucvuRecursive($data);
    //     $htmlOption = $recursive->Recursive($parentid);
    //     return $htmlOption;
    // }    

    // public function add(){
    //     $htmlOption = $this->getRecursive($parentid = '');
    //     return view('bangluong.add',compact('htmlOption'));
    // }

    //store

    public function store(Request $request){
        $this->bangluong->create([
            'tencv' => $request->tencv,
            'luong' => $request->mucluong,
            'mota' => $request->mota,
        ]);
        return redirect()->route('bangluong.index');
    }

    //edit
    public function edit($id){
       $chucvu = $this->chucvu->find($id);
       $htmlOption = $this->ChucvuList();
       $bangluong = $this->bangluong->find($id);
       return view('bangluong.edit',compact('bangluong','htmlOption'));
    }

    //store
    public function update($id,Request $request){
        $this->bangluong->find($id)->update([
            'tencv' => $request->tencv,
            'luong' => $request->mucluong,
            'mota' =>  $request->mota,
        ]);
        return redirect()->route('bangluong.index');
     }

    //delete
    public function delete($id){
        $this->bangluong->find($id)->delete();
        return redirect()->route('bangluong.index');
    }
}
