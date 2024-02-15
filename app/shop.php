<?php

namespace App;

use illuminate\Database\Eloquent\Model;

class shop extends Model
{
    protected $fillable=['id','name','items'];
    protected $table='shop';
    protected $primarykey='id';
}