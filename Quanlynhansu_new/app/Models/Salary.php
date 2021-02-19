<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $table = 'salaries';
    protected $fillable = ['employee_id','regency_id','bonus_discip_id','basic_salary_id'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
