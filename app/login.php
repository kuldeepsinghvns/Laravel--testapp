<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\password;

class  login extends Model
{
    protected $fillable=['id','password'];
    protected $table='login';
    protected $unique='name';
}