<?php

namespace App\Http\Controllers;

use App\Components\ListItem;
use App\Http\Requests\BonusDiscipRequest;
use App\Models\bonus_discip;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BonusDiscipController extends Controller
{
    //
    private $bonusdiscip;
    private $employee;

    public function __construct(bonus_discip $bonusdiscip,Employee $employee){
        $this->bonusdiscip = $bonusdiscip;
        $this->employee = $employee;
    }

    public function index(){
        $bonusdiscip = $this->bonusdiscip->latest()->paginate(5);
        return view('bonusdiscip.index',compact('bonusdiscip'));
    }

    public function getEmployee($id){
        $emloyee = $this->employee->all();
        $listitem = new ListItem($emloyee);
        $emloyeeoption = $listitem->getAll($id);
        return $emloyeeoption;
    }

    public function add(){
        $employee = $this->getEmployee($id='');
        $timenow = Carbon::now()->toDateString();
        return view('bonusdiscip.add',compact('employee','timenow'));
    }

    public function store(BonusDiscipRequest $request){
        $this->bonusdiscip->create($request->all());
        return redirect()->route('bonusdiscip.index');
    }

    public function delete($id){
        $bonusdiscip = $this->bonusdiscip->find($id);
        $bonusdiscip->delete();
        return redirect()->route('bonusdiscip.index');
    }

    public function edit($id){
        $bonusdiscip = $this->bonusdiscip->find($id);
        $employee = $this->getEmployee($bonusdiscip->employee_id);
        return view('bonusdiscip.edit',compact('bonusdiscip','employee'));
    }

    public function update(BonusDiscipRequest $request,$id){
        $this->bonusdiscip->find($id)->update($request->all());
        return redirect()->route('bonusdiscip.index');
    }
}
