<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;
class Review extends Model
{
    protected $fillable = ["title","body","rating","product_id"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
