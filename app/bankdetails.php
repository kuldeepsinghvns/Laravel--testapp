<?php

namespace App;
use illuminate\Database\Eloquent\Model;

class Bankdetails extends Model
{
    protected $fillable=['id','bankname'];
    protected $table='bankdetails';
    protected $primarykey='id';
    

}