<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Auth;
use App\User;

class Order extends Model
{
    protected $fillable = ["total","delivered"];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot("quantity","total");
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function createOrder($cart){
         // create order
         $user = Auth::user();
         $order = new Order();
         $order->total = $cart->totalPrice;
         $order->delivered = 0;
         $user->orders()->save($order);
 
         // items in the cart
 
     $items = $cart->items;
     foreach ( $items as $item) 
     $order->products()->attach($item["item"]->id,
     [
         "quantity" => $item["quantity"],
         "total"=> $item["price"]
     ]
     );
    }
}
