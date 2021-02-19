<?php

namespace App\Http\Controllers;

use App\Components\ListItem;
use App\Models\Calendar;
use App\Models\Employee;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    private $employee;
    private $calendar;

    public function __construct(Calendar $calendar,Employee $employee){
        $this->calendar = $calendar;
        $this->employee = $employee;
    }

    public function index(){
        $calendarList = $this->calendar->latest()->paginate(5);
        return view('calendar.index',compact('calendarList'));
    }

    public function add(){
        $employee = $this->employee->all();
        return view('calendar.add',compact('employee'));
    }

    public function store(Request $request){
        $calendar = $this->calendar->create([
            'daywork' => $request->daywork,
            'ca' => $request->ca,
        ]);
        $calendar->employee()->attach($request->employee_id);
        return redirect()->route('calendar.index');
    }

    public function delete($id){
        $calendar = $this->calendar->find($id);
        $calendar->delete();
        $calendar->employee()->detach();
        return redirect()->route('calendar.index');
    }

    public function edit($id){
        $employee = $this->employee->all();
        $calendar = $this->calendar->find($id);
        $employeeofcalendar = $calendar->employee;
        return view('calendar.edit',compact('calendar','employee','employeeofcalendar'));
    }

    public function update($id,Request $request){
        $calendar = $this->calendar->find($id);

        $calendar->update([
            'daywork' => $request->daywork,
            'ca' => $request->ca,
        ]);

        $calendar->employee()->sync($request->employee_id);
        return redirect()->route('calendar.index');
    }

    public function details($id){
        $calendar = $this->calendar->find($id);
        $employeeofcalendar = $calendar->employee;
        $employeeattend = $calendar->attend;
        return view('calendar.details',compact('calendar','employeeofcalendar','employeeattend'));
    }
}
