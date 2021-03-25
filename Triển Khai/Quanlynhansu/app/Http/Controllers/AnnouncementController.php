<?php

namespace App\Http\Controllers;

use App\Components\ListItem;
use App\Http\Requests\AnnounceRequest;
use App\Models\Announcement;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    //
    private $announcement;
    private $department;

    public function __construct(Announcement $announcement,Department $department){
        $this->announcement = $announcement;
        $this->department = $department;
    }

    public function index(){
        $announce = $this->announcement->latest()->paginate(10);
        return view('announcement.index',compact('announce'));
    }

    public function add(){
        $department = $this->getDepartment($id='');
        return view('announcement.add',compact('department'));
    }

    public function store(AnnounceRequest $request){
        $day = Carbon::now()->toDateString();

        $announment = new Announcement();
        $announment->name = $request->name;
        $announment->department_id = $request->department_id;
        $announment->description = $request->description;
        $announment->user_id = Auth::user()->id;
        $announment->timeday = $day;
        $announment->save();

        return redirect()->route('announcement.index');
    }

    public function delete($id){
        $this->announcement->find($id)->delete();
        return redirect()->route('announcement.index');
    }

    public function edit($id){
        $announce = $this->announcement->find($id);
        $department = $this->getDepartment($announce->department_id);
        return view('announcement.edit',compact('announce','department'));
    }

    public function update($id,AnnounceRequest $request){
        $this->announcement->find($id)->update([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'timeday' => $request->timeday,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('announcement.index');
    }

    public function read($id){
        $announcement = $this->announcement->find($id);
        return view('announcement.read',compact('announcement'));
    }

    public function getDepartment($id){
        $department = $this->department->all();
        $listitem = new ListItem($department);
        $departmentoption = $listitem->getAll($id);
        return $departmentoption;
    }
}
