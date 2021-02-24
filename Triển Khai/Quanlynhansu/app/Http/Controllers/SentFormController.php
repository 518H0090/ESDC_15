<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\SentForm;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SentFormController extends Controller
{
    //
    private $user;
    private $sentform;
    private $calendar;

    public function __construct(User $user,SentForm $sentform,Calendar $calendar){
        $this->user = $user;
        $this->sentform = $sentform;
        $this->calendar = $calendar;
    }

    public function index(){
        $sentform = $this->sentform->latest()->paginate(10);
        return view('sentform.index',compact('sentform'));
    }

    public function add(){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $user_employee_id = Auth::user()->employee_id;
            return view('sentform.add',compact('user_id','user_employee_id'));
        }else{
            return view('sentform.add');
        }
    }

    public function store(Request $request){
//        $carbon = new Carbon($request->daywork);
//        $timework = $carbon->weekOfYear;
//        dd($timework);
        $this->sentform->create([
            'user_id' => $request->user_id,
            'employee_id' => $request->employee_id,
            'ca' => $request->ca,
            'daywork' => $request->daywork,
            'daysent' => Carbon::now()->toDateString(),
        ]);
        return redirect()->route('sentform.index');
    }

    public function delete($id){
        $this->sentform->find($id)->delete();
        return redirect()->route('sentform.index');
    }

    public  function edit($id){
        $sentform = $this->sentform->find($id);
        return view('sentform.edit',compact('sentform'));
    }

    public function update($id , Request $request){
        $this->sentform->find($id)->update([
            'user_id' => $request->user_id,
            'employee_id' => $request->employee_id,
            'ca' => $request->ca,
            'daywork' => $request->daywork,
            'daysent' => $request->daysent,
            'status' => $request->status,
        ]);
        return redirect()->route('sentform.index');
    }

    public function confirm($id){
        $sentform = $this->sentform->find($id);
        return view('sentform.confirm',compact('sentform'));
    }

    public function verify($id,Request $request){
        if ($request->status == 1){
            $this->sentform->find($id)->update([
                'id' => $request->id,
                'user_id' => $request->user_id,
                'employee_id' => $request->employee_id,
                'ca' => $request->ca,
                'daywork' => $request->daywork,
                'daysent' => $request->daysent,
                'status' => $request->status,
            ]);

            $calendar = new Calendar();
            $calendar->employee_id = $request->employee_id;
            $calendar->daywork = $request->daywork;
            $calendar->ca = $request->ca;
            $calendar->sentform_id = $request->id;
            $calendar->save();
        }else{
            $this->sentform->find($id)->update([
                'user_id' => $request->user_id,
                'employee_id' => $request->employee_id,
                'ca' => $request->ca,
                'daywork' => $request->daywork,
                'daysent' => $request->daysent,
                'status' => $request->status,
            ]);

            $this->calendar->where('sentform_id',$request->id)->delete();
        }

        return redirect()->route('sentform.index');
    }
}
