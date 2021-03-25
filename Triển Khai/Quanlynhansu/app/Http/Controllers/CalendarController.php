<?php

namespace App\Http\Controllers;

use App\Components\ListItem;
use App\Http\Requests\CalendarRequest;
use App\Models\Calendar;
use App\Models\Employee;
use Carbon\Carbon;
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
        $calendar = $this->calendar->get('daywork');
        return view('calendar.index',compact('calendarList','calendar'));
    }

    public function add(){
        $employee = $this->getEmployee($id='');
        return view('calendar.add',compact('employee'));
    }

    public function store(CalendarRequest $request){
        $calendar = new Calendar();
        $calendar->employee_id = $request->employee_id;
        $calendar->daywork = $request->daywork;
        $calendar->ca = $request->ca;
        $calendar->save();
        return redirect()->route('calendar.index');
    }

    public function delete($id){
        $calendar = $this->calendar->find($id);
        $calendar->delete();
        return redirect()->route('calendar.index');
    }

    public function edit($id){
        $calendar = $this->calendar->find($id);
        $employee = $this->getEmployee($calendar->employee_id);
        return view('calendar.edit',compact('calendar','employee'));
    }

    public function getEmployee($id){
        $emloyee = $this->employee->all();
        $listitem = new ListItem($emloyee);
        $emloyeeoption = $listitem->getAll($id);
        return $emloyeeoption;
    }

    public function update($id,CalendarRequest $request){
        $calendar = $this->calendar->find($id);
        $calendar->update([
            'daywork' => $request->daywork,
            'ca' => $request->ca,
            'employee_id' => $request->employee_id,
        ]);

        $calendar2 = new Calendar();
        $calendarid = $calendar2->find($id);
        $calendarid->attendance = $request->attendance;
        $calendarid->save();
        return redirect()->route('calendar.index');
    }
}
