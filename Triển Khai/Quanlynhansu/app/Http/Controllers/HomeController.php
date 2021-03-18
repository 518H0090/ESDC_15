<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
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
    private $announcement;

    public function __construct(Employee $employee,Department $department,User $user,Regency $regency,bonus_discip $bonus_discip,Announcement $announcement){
        $this->employee = $employee;
        $this->department = $department;
        $this->user = $user;
        $this->regency = $regency;
        $this->bonus_discip = $bonus_discip;
        $this->announcement = $announcement;
    }

    public function index(){
        $employee = $this->employee->count();
        $deparment = $this->department->count();
        $user = $this->user->count();
        $regency = $this->regency->count();

        $announcement = $this->announcement->latest()->paginate(20);

        return view('home',compact('employee','deparment','user','regency','announcement'));
    }
}
