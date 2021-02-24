<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calendar extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'calendars';
    protected $guarded = [];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function sentform(){
        return $this->belongsTo(SentForm::class,'sentform_id');
    }
}
