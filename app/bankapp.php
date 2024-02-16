<?php

namespace App;

use illuminate\Database\Eloquent\Model;


class bankapp extends Model
{
    protected $fillable=['id','name','banknumber','balance'];
    protected $table='bankapp';
    protected $primarykey='id';
    protected $unique='banknumber';
}