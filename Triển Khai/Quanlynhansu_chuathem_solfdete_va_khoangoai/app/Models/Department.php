<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = ['name', 'description'];

    public function departmentjoin(){
        return $this->hasMany(Department_Join::class,'department_id','id');
    }
}
