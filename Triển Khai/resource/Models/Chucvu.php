<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chucvu extends Model
{
    use HasFactory;
    protected $table = 'chucvus';

    protected $fillable = ['TenCV','parent_id'];
}
