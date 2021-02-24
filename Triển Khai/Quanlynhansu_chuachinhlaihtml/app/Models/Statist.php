<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statist extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'statists';
    protected $guarded = [];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
