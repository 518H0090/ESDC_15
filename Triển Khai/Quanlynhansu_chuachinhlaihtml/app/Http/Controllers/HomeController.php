<?php

namespace App\Http\Controllers;

use App\Models\bonus_discip;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    private $employee;
    private $department;
    private $user;
    private $regency;
    private $bonus_discip;

    public function __construct(Employee $employee,Department $department,User $user,Regency $regency,bonus_discip $bonus_discip){
        $this->employee = $employee;
        $this->department = $department;
        $this->user = $user;
        $this->regency = $regency;
        $this->bonus_discip = $bonus_discip;
    }

    public function index(){
        $employee = $this->employee->count();
        $deparment = $this->department->count();
        $user = $this->user->count();
        $regency = $this->regency->count();
        $bonus = $this->bonus_discip->where('type',0)->count();
        $discip = $this->bonus_discip->where('type',1)->count();
        $bonus_money = $this->bonus_discip->where('type',0)->sum('money');
        $discip_money = $this->bonus_discip->where('type',1)->sum('money');

        return view('home',compact('employee','deparment','user','regency','bonus','discip','bonus_money','discip_money'));
    }
}
