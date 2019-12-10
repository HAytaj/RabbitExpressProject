<?php

namespace App;
use App\City;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ["name","code"];

}
