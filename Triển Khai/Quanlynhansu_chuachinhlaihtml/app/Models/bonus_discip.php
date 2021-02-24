<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bonus_discip extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'bonus_discips';
    protected $fillable = ['name','type','day','employee_id','money','description'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
