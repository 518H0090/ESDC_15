<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'departments';
    protected $fillable = ['name', 'description'];

    public function departmentjoin(){
        return $this->hasMany(Department_Join::class,'department_id','id');
    }

    public function announce(){
        return $this->hasMany(Announcement::class,'department_id');
    }
}
