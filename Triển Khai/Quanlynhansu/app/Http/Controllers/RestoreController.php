<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\bonus_discip;
use App\Models\Calendar;
use App\Models\Employee;
use App\Models\Regency;
use App\Models\SentForm;
use App\Models\Statist;
use App\Models\User;
use Illuminate\Http\Request;
use File;

class RestoreController extends Controller
{
    //
    private $employee;
    private $regency;
    private $announcement;

    public function __construct(Employee $employee,Regency $regency,Announcement $announcement){
        $this->employee = $employee;
        $this->regency = $regency;
        $this->announcement = $announcement;
    }
    //Employee
    public  function index(){
        return view('Restore.index');
    }

    public function restoreEmployee(){
        $employee_trash = Employee::onlyTrashed()->latest()->paginate(10);
        return view('Restore.employee',compact('employee_trash'));
    }

    public function restoreEmployeeAction($id){
        Employee::onlyTrashed()->find($id)->restore();
        return redirect()->route('restore.restoreEmployee');
    }

    public function restoreEmployeeAll(){
        Employee::onlyTrashed()->restore();
        return redirect()->route('restore.restoreEmployee');
    }

    public function deleteEmployeeAction($id){
        $employee_trash = Employee::onlyTrashed()->find($id);
        File::delete(public_path('storage/avatars/'. $employee_trash->file_name));
        Employee::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('restore.restoreEmployee');
    }

    public function deleteEmployeeAll(){
        $employee_trash = Employee::onlyTrashed()->get();
        Employee::onlyTrashed()->forceDelete();
        foreach($employee_trash as $item) {
            File::delete(public_path('storage/avatars/' . $item->file_name));
        }
        return redirect()->route('restore.restoreEmployee');
    }

    //Regency
    public function restoreRegency(){
        $regency_trash = Regency::onlyTrashed()->latest()->paginate(10);
        return view('Restore.regency',compact('regency_trash'));
    }

    public function restoreRegencyAction($id){
        Regency::onlyTrashed()->find($id)->restore();
        return redirect()->route('restore.restoreRegency');
    }

    public function restoreRegencyAll(){
        Regency::onlyTrashed()->restore();
        return redirect()->route('restore.restoreRegency');
    }

    public function deleteRegencyAction($id){
        Regency::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('restore.restoreRegency');
    }

    public function deleteRegencyAll(){
        Regency::onlyTrashed()->forceDelete();
        return redirect()->route('restore.restoreRegency');
    }

    //Calendar
    public function restoreCalendar(){
        $calendar_trash = Calendar::onlyTrashed()->latest()->paginate(10);
        return view('Restore.calendar',compact('calendar_trash'));
    }

    public function restoreCalendarAction($id){
        Calendar::onlyTrashed()->find($id)->restore();
        return redirect()->route('restore.restoreCalendar');
    }

    public function restoreCalendarAll(){
        Calendar::onlyTrashed()->restore();
        return redirect()->route('restore.restoreCalendar');
    }

    public function deleteCalendarAction($id){
        Calendar::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('restore.restoreCalendar');
    }

    public function deleteCalendarAll(){
        Calendar::onlyTrashed()->forceDelete();
        return redirect()->route('restore.restoreCalendar');
    }

    //Sentform
    public function restoreFormRestore(){
        $sentform_trash = SentForm::onlyTrashed()->latest()->paginate(10);
        return view('Restore.sentform',compact('sentform_trash'));
    }

    public function restoreSentFormAction($id){
        SentForm::onlyTrashed()->find($id)->restore();
        return redirect()->route('restore.restoreFormRestore');
    }

    public function restoreSentFormAll(){
        SentForm::onlyTrashed()->restore();
        return redirect()->route('restore.restoreFormRestore');
    }

    public function deleteSentFormAction($id){
        SentForm::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('restore.restoreFormRestore');
    }

    public function deleteSentFormAll(){
        SentForm::onlyTrashed()->forceDelete();
        return redirect()->route('restore.restoreFormRestore');
    }

    //Bonus_Discip
    public function restoreBonusDiscipRestore(){
        $bonusdiscip_trash = bonus_discip::onlyTrashed()->latest()->paginate(10);
        return view('Restore.bonusdiscip',compact('bonusdiscip_trash'));
    }

    public function restoreBonusDiscipAction($id){
        bonus_discip::onlyTrashed()->find($id)->restore();
        return redirect()->route('restore.restoreBonusDiscipRestore');
    }

    public function restoreBonusDiscipAll(){
        bonus_discip::onlyTrashed()->restore();
        return redirect()->route('restore.restoreBonusDiscipRestore');
    }

    public function deleteBonusDiscipAction($id){
        bonus_discip::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('restore.restoreBonusDiscipRestore');
    }

    public function deleteBonusDiscipAll(){
        bonus_discip::onlyTrashed()->forceDelete();
        return redirect()->route('restore.restoreBonusDiscipRestore');
    }

    //Salary
    public function restoreSalaryRestore(){
        $salary_trash = Statist::onlyTrashed()->latest()->paginate(10);
        return view('Restore.salary',compact('salary_trash'));
    }

    public function restoreSalaryAction($id){
        Statist::onlyTrashed()->find($id)->restore();
        return redirect()->route('restore.restoreSalaryRestore');
    }

    public function restoreSalaryAll(){
        Statist::onlyTrashed()->restore();
        return redirect()->route('restore.restoreSalaryRestore');
    }

    public function deleteSalaryAction($id){
        Statist::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('restore.restoreSalaryRestore');
    }

    public function deleteSalaryAll(){
        Statist::onlyTrashed()->forceDelete();
        return redirect()->route('restore.restoreSalaryRestore');
    }

    //User
    public function restoreUserRestore(){
        $user_trash = User::onlyTrashed()->latest()->paginate(10);
        return view('Restore.User',compact('user_trash'));
    }

    public function restoreUSerAction($id){
        User::onlyTrashed()->find($id)->restore();
        return redirect()->route('restore.restoreUserRestore');
    }

    public function restoreUserAll(){
        User::onlyTrashed()->restore();
        return redirect()->route('restore.restoreUserRestore');
    }

    public function deleteUserAction($id){
        User::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('restore.restoreUserRestore');
    }

    public function deleteUserAll(){
        User::onlyTrashed()->forceDelete();
        return redirect()->route('restore.restoreUserRestore');
    }

    //Announcement
    public function restoreAnnounceRestore(){
        $announcement_trash = Announcement::onlyTrashed()->latest()->paginate(10);
        return view('Restore.announcement',compact('announcement_trash'));
    }

    public function restoreAnnounceAction($id){
        Announcement::onlyTrashed()->find($id)->restore();
        return redirect()->route('restore.restoreAnnounceRestore');
    }

    public function restoreAnnounceAll(){
        Announcement::onlyTrashed()->restore();
        return redirect()->route('restore.restoreAnnounceRestore');
    }

    public function deleteAnnounceAction($id){
        Announcement::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('restore.restoreAnnounceRestore');
    }

    public function deleteAnnounceAll(){
        Announcement::onlyTrashed()->forceDelete();
        return redirect()->route('restore.restoreAnnounceRestore');
    }
}
