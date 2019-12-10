<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Review;

class Product extends Model
{
    protected $fillable = ["name","price","description","size","image_name","category_id"];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
