<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;
use Auth;
use App\Category;
use App\Categories;

class FrontController extends Controller
{
    public function index(){
       
        $products = Product::orderBy("id","desc")->take(6)->get();
        
        $categories = Categories::categories();
        return view("front.index")->with(["products"=>$products,"categories"=>$categories]);
    }

    

    public function shirt($id){
        $product=Product::find($id);
        
        if($product == null){
            return view("front.problem");
        }
        $categories = Categories::categories();
        $reviews = Review::where('product_id', '=', $id)->orderBy("created_at","desc")->paginate(4);
        
        return view("front.shirt")->with(["product"=>$product,"reviews"=>$reviews, "product_rating"=>$reviews->avg('rating'),"categories"=>$categories]);
    }

    public function shirts($id = 0){
        if($id != 0)
        {
            $category = Category::find($id);
            if($category == null){
                return view("front.problem");
            }
            $products = $category->products()->orderBy("created_at","desc")->paginate(10);
            
        }else{
            $products = Product::orderBy("created_at","desc")->paginate(6);

        }
        $categories = Categories::categories();
        return view("front.shirts")->with(["products"=>$products,"categories"=>$categories]);
    }

    public function changeSize(Request $request, $id){
        $product = Product::find($id);
        if($product == null){
            return view("front.problem");
        }
        $product->size = $request["size"];

        $product->save();

        return back(); 
    }
   
   
}
