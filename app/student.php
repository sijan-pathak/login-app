<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable=['name','email','password','repassword','created_at','updated_at'];
}
