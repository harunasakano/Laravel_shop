<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $filable = ['id','Userid','itemCode','type','buyDate','created_at','updated_at'];
}
