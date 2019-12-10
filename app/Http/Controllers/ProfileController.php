<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Auth;
use App\Category;
use App\Categories;
use App\Order;

class ProfileController extends Controller
{
   
    public function index(){
        $categories = Categories::categories();
        $orders = Order::where("user_id","=",Auth()->user()->id)->get();
        return view("/profile/index")->with(["categories"=>$categories, "orders"=>$orders]);
    }
    

    public function storeReview(Request $request){
        $request["title"] = strip_tags($request['title']);
        $request["body"] = strip_tags($request['body']);
        //dd($request["title"].' '.$request["body"]);
         $this->validate($request, [ //^(?=.*[A-ZÜÖĞIƏÇŞüöğıəçş0-9])[\w.,!\/$ ]+$
             "title" => 
                 array(
                     'required',
                     "regex:/[a-zA-Z0-9üöğıəçşÜÖĞIƏÇŞ.,!]/",
                     "max:100"
                 ),
             "body"=>array(
                 "required",
                 "regex:/[a-zA-Z0-9üöğıəçşÜÖĞIƏÇŞ.,!]/",
                 "max:500"
             ),
             "rating"=>"required"
         ]);
        $review = new Review();
        $review->title = $request["title"];
        $review->body = $request["body"];
        $review->rating = $request["rating"];
        $review->user_id = Auth::user()->id;
        $review->product_id = $request["product_id"];
        $review->save();
        return back()->with(["success"=>"Your review has been added."]);
    }

    public function destroy($id){
        $review = Review::find($id);

        if($review == null){
            return view("front.problem");
        }

        $review->delete();
        return back();
    }
}
