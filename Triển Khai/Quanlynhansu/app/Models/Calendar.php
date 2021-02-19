<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $table = 'calendars';
    protected $fillable = ['daywork','ca'];

    public function attend(){
        return $this->hasMany(Employee_Calendar::class,'calendar_id');
    }

    public function employee(){
        return $this->belongsToMany(Employee::class,Employee_Calendar::class,'calendar_id','employee_id');
    }
}
