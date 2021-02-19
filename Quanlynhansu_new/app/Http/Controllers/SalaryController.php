<?php

namespace App\Http\Controllers;

use App\Components\ListItem;
use App\Models\BasicSalary;
use App\Models\bonus_discip;
use App\Models\Calendar;
use App\Models\Employee;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    //
    private $employee;
    private $salary;
    private $bonus_discip;

    private $calendar;

    public function __construct(Employee $employee,Salary $salary,bonus_discip $bonus_discip,Calendar $calendar){
        $this->employee = $employee;
        $this->salary = $salary;
        $this->bonus_discip = $bonus_discip;

        $this->calendar = $calendar;
    }

    public function index(){
        return view('salary.index');
    }

    public function getEmployee($id){
        $emloyee = $this->employee->all();
        $listitem = new ListItem($emloyee);
        $emloyeeoption = $listitem->getAll($id);
        return $emloyeeoption;
    }

    public function add(){
        $employees = $this->getEmployee($id='');
        $basicsalary = $this->basicSalary->all();
        $test = $this->employee->calendar()->join('employee_calendar','employee.id','=','employee_calendar.employee_id')->where('attendance','=',0);
        dd($test);
        $calendar = $this->calendar->all();
        return view('salary.add',compact('employees','basicsalary','calendar'));
    }

    public function store(Request $request){

    }
}
