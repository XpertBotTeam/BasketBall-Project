<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','fullName','Description','country','city','img','ownership','headcoach','generalmanager','championships'];


}
