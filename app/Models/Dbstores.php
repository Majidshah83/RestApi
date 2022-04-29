<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dbstores extends Model
{

    use HasFactory;
    protected $fillable = ['name','email','password','uuid'];
     protected $casts = ['uuid'=>'string'];
     
     public $timestamps = false;

}