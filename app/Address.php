<?php

namespace App;
use App\User;
use App\City;
use App\Country;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ["address","city","country","zip"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
