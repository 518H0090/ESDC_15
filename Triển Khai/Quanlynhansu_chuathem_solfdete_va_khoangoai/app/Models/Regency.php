<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;
    protected $table = 'regencies';
    protected $fillable = ['name','parent_id','basic_money'];

    public function employee(){
        return $this->hasMany(Employee::class,'id_regency');
    }
}
