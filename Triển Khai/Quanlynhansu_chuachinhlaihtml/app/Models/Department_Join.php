<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department_Join extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'department__joins';
    protected $fillable = ['department_id','employee_id','regency_id'];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
