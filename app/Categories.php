<?php
namespace App;
use App\Category;

class Categories{
    public static function categories(){
        $categories = Category::all()->groupBy("parent_id");
        if (count($categories) >= 1) {
            $categories["root"] =  $categories[0];
            unset($categories[0]);
        }
        return $categories;
    }
}
?>