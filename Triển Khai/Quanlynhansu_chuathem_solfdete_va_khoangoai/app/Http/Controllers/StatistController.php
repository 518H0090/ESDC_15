<?php

namespace App\Http\Controllers;

use App\Components\ListItem;
use App\Models\Employee;
use App\Models\Statist;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatistController extends Controller
{
    //
    private $employee;
    private $statist;

    public function __construct(Employee $employee,Statist $statist){
        $this->employee = $employee;
        $this->statist = $statist;
    }

    public function index(){
        $statist = $this->statist->latest()->paginate(5);
        return view('statists.index',compact('statist'));
    }

    public function getEmployee($id){
        $emloyee = $this->employee->all();
        $listitem = new ListItem($emloyee);
        $emloyeeoption = $listitem->getAll($id);
        return $emloyeeoption;
    }

    public function add(){
        $employee = $this->getEmployee($id='');
        return view('statists.add',compact('employee'));
    }

    public function store(Request $request){
        $this->statist->create([
            'employee_id' => $request->employee_id,
             'year' => $request->year,
                'month' => $request->month,
            ]
        );
        return redirect()->route('statists.index');
    }

    public function delete($id){
        $this->statist->find($id)->delete();
        return redirect()->route('statists.index');
    }

    public function statist($id,$employee_id,$year,$month){
        $statist = $this->statist->find($id);
        $dayoff = $this->employee->find($employee_id)->calendar()->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->where('attendance',0)->count();
        $daywork = $this->employee->find($employee_id)->calendar()->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->where('attendance',1)->count();
        $basic_money = $this->employee->find($employee_id)->regency()->sum('basic_money');
        $bonus_money = $this->employee->find($employee_id)->bonus_discip()->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->where('type',0)->sum('money');
        $discip_money = $this->employee->find($employee_id)->bonus_discip()->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->where('type',1)->sum('money');
        $daystatist = Carbon::now()->toDateString();

        if ($dayoff > 3){
            (double)$real_money = (double)$basic_money + ( (double)$daywork- (double)$dayoff) + (double)$bonus_money - (double)$discip_money;
        }else{
            (double)$real_money = (double)$basic_money + (double)$daywork + (double)$bonus_money - (double)$discip_money;
        }

        return view('statists.statist',compact('dayoff','daywork','bonus_money','basic_money','discip_money','daystatist','statist','real_money'));
    }

    public function resultstatist($id,Request $request){
       $this->statist->find($id)->update([
           'money' => $request->money,
           'bonus_money' => $request->bonus_money,
           'discip_money' => $request->discip_money,
           'attend' => $request->attend,
           'absent' => $request->absent,
           'daystatist' => $request->daystatist,
           'real_money' => $request->real_money,
       ]);
        return redirect()->route('statists.index');
    }
}
