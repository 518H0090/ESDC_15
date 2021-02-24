<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicSalary extends Model
{
    use HasFactory;
    protected $table = 'basic_salaries';
    protected $fillable = ['id_regency','salary'];

    public function regency(){
        return $this->belongsTo(Regency::class,'id_regency');
    }
}
