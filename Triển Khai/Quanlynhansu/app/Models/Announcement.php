<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'announcement';
    protected $fillable = ['name','user_id','department_id','timeday','description'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
}
