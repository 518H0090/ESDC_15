<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentForm extends Model
{
    use HasFactory;
    protected $table = 'sent_forms';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function calendar(){
        return $this->hasOne(Calendar::class,'sentform_id');
    }
}
