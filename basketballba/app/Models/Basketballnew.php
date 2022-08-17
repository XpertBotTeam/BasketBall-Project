<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basketballnew extends Model
{
    use HasFactory;
    protected $fillable = ['id','img','title','content','info'];
}
