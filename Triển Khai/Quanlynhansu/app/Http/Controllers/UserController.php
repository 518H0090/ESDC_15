<?php

namespace App\Http\Controllers;

use App\Components\ListItem;
use App\Http\Requests\UserRequest;
use App\Models\Employee;
use App\Models\Role;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    private $user;
    private $role;
    private $employee;

    public function __construct(\App\Models\User $user,Role $role,Employee $employee){
        $this->user = $user;
        $this->role = $role;
        $this->employee = $employee;
    }

    public function index(){
        $users = $this->user->latest()->paginate(5);
        return view('user.index',compact('users'));
    }

    public function add(){
        $employee = $this->getEmployee($id='');
        $role = $this->getRole($id='');
        return view('user.add',compact('employee','role'));
    }

    public function getEmployee($id){
        $emloyee = $this->employee->all();
        $listitem = new ListItem($emloyee);
        $emloyeeoption = $listitem->getAll($id);
        return $emloyeeoption;
    }

    public function getRole($id){
        $role = $this->role->all();
        $listitem = new ListItem($role);
        $roleoption = $listitem->getAll($id);
        return $roleoption;
    }

    public function store(UserRequest $request){
        $this->user->create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'employee_id' => $request->employee_id,
            'role_id' => $request->role_id,
        ]);
        return redirect()->route('user.index');
    }

    public function delete($id){
        $this->user->find($id)->delete();
        return redirect()->route('user.index');
    }

    public function edit($id){
        $user = $this->user->find($id);
        $employee = $this->getEmployee($user->employee_id);
        $role = $this->getRole($user->role_id);
        return view('user.edit',compact('employee','role','user'));
    }

    public function update($id,Request $request){
        $this->user->find($id)->update([
            'email' => $request->email,
            'employee_id' => $request->employee_id,
            'role_id' => $request->role_id,
        ]);
        return redirect()->route('user.index');
    }

    public function editpassword($id){
        $user = $this->user->find($id);
        return view('user.editpassword',compact('user'));
    }

    public function updatepassword($id,Request $request){
        $this->user->find($id)->update([
            'password' =>bcrypt($request->password),
        ]);
        return redirect()->route('user.index');
    }
}
