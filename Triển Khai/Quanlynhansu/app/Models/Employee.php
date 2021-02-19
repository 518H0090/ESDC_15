<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['name','image_employee','phone','id_regency','file_name'];

    public function regency(){
        return $this->belongsTo(Regency::class,'id_regency');
    }

    public function departmentjoin(){
        return $this->hasOne(Department_Join::class);
    }

    public function calendar(){
        return $this->belongsToMany(Calendar::class,Employee_Calendar::class,'employee_id','calendar_id');
    }

    public function bonus_discip(){
        return $this->hasMany(bonus_discip::class,'employee_id');
    }
}
