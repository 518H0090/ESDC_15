<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Regency extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'regencies';
    protected $fillable = ['name','parent_id','basic_money'];

    public function employee(){
        return $this->hasMany(Employee::class,'id_regency');
    }
}
