<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_Calendar extends Model
{
    use HasFactory;
    protected $table = 'emloyee_calendar';
    protected $fillable = ['employee_id','calendar_id'];

    public function calendar(){
        return $this->belongsTo(Calendar::class,'calendar_id');
    }
}
