<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $table = 'calendars';
    protected $fillable = ['daywork','ca'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function sentform(){
        return $this->belongsTo(SentForm::class,'sentform_id');
    }
}
