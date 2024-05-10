<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class employeedata extends Model
{
    protected $fillable = ['id','name','city','salary'];
    protected $table='employeedata';
    protected $primarykey='id';
}
?>