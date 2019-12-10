<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;
use App\Order;
use Stripe\Stripe;
use App\Categories;

class CartController extends Controller
{
    public function store(Request $request, $id){
        $product = Product::find($id);
        if($product == null){
            return view("front.problem");
        }
        $oldCart = Session::has("cart") ? Session::get("cart") : null;
        $cart = new Cart($oldCart);
        $cart->addOrUpdate($product, $product->id);

        $request->session()->put("cart", $cart);
        session(['item_added_to_cart' => true]);
        session(['address_added' => false]);
        return redirect("/cart/cartItems");        
    }

    public function cartItems(){
        $categories = Categories::categories();

        if (!Session::has("cart")) {
            return view("cart.shoppingCart")->with(["products"=>null, "totalPrice"=>0,"totalQuantity"=>0, "tax" => 0,"categories"=>$categories]);
        }
        $oldCart = Session::get("cart");
        $cart = new Cart($oldCart);
        return view("cart.shoppingCart")->with(["products"=>$cart->items, "totalPrice"=>$cart->totalPrice, "totalQuantity"=>$cart->totalQuantity,"tax" => $cart->tax,"categories"=>$categories]);
    }

    public function checkOut(){
        
        if(!session('item_added_to_cart') || session('item_added_to_cart') == null){
            return redirect("/shirts")->with("error","Add a product to the cart, please.");
        }
        if(!session('address_added') || session('address_added') == null){
            return redirect("/address/create")->with("error","Add your address, please.");
        }
        if (!Session::has("cart")) {
            $totalPrice=0;
            $totalQuantity = 0;
            $taxt = 0;
            return view("cart.checkOut")->with(["totalPrice"=>$totalPrice,"totalQuantity"=>$totalQuantity, "tax" => $tax]);
        }

        $categories = Categories::categories();
        $oldCart = Session::get("cart");
        $cart = new Cart($oldCart);
        return view("cart.checkOut")->with(["totalPrice"=>$cart->totalPrice,"categories"=>$categories]);
    }

    public function payment(Request $request){
         
        if(!session('item_added_to_cart') || session('item_added_to_cart') == null || !session('address_added') || session('address_added') == null){
            return redirect("/shirts")->with("error","Add a product to the cart, please");
        }
        if (!Session::has("cart")) {
            $totalPrice=0;
            return view("cart.checkOut")->with("totalPrice",$totalPrice);
        }    
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_Lbh1HIyiv9bcqqkf0K4HiGdt00mFcPXUfy');
        
        
        $oldCart =Session::get("cart");
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_Lbh1HIyiv9bcqqkf0K4HiGdt00mFcPXUfy');
        $token = $_POST['stripeToken'];

        try{
            // Token is created using Checkout or Elements!
                // Get the payment token ID submitted by the form:
                    $charge = \Stripe\Charge::create([
                        'amount' => $cart->totalPrice * 100,
                        'currency' => 'usd',
                        'description' => 'Example charge',
                        'source' => $token,
                ]);
        }
        catch(Exception $e){
            return redirect("cart/checkOut")->with("error",$e->getMessage());
        }
        Order::createOrder($cart);
        Session::forget("cart");
        session(['item_added_to_cart' => false]);
        session(['address_added' => false]);
        return redirect("shirts")->with(["success"=>"Successfully purchased!"]);
    }

    public function quantityUpdate(Request $request, $id){
        if (!Session::has("cart")) {
            return view("cart.shoppingCart")->with(["products"=>null, "totalPrice"=>0,"totalQuantity"=>0, "tax" => 0]);
        }
        $request["quantity"] = strip_tags($request['quantity']);
        $this->validate($request, 
        ["quantity"=>"regex:/^[1-9]\d*(?:\.\d+)?(?:[kmbt])?$/"]);
        if ( $request["quantity"] < 0 || $request["quantity"] == 0) {
            return redirect("/cart/cartItems")->with("error","Quantity cannot be less than or equal to zero.");
        }
        else
        {
            $oldCart = Session::get("cart");
            $cart = new Cart($oldCart);
            $product = Product::find($id);
            if($product == null){
                return view("front.problem");
            }
            $cart->addOrUpdate($product, $product->id, $request["quantity"]);

            $request->session()->put("cart", $cart);
            return redirect("/cart/cartItems");
        }
    }


    public function emptyCart(Request $request){
        $request->session()->forget('cart');
        session(['item_added_to_cart' => false]);
        session(['address_added' => false]);
        return redirect("/shirts");
    }

    public function destroy(Request $request, $id){
        
         if (!Session::has("cart")) {
            return view("cart.shoppingCart")->with(["products"=>null, "totalPrice"=>0,"totalQuantity"=>0, "tax" => 0]);
        }

        $oldCart = Session::get("cart");

        $cart = new Cart($oldCart);

        $cart->remove($id);

        $request->session()->put("cart", $cart);
        $categories = Categories::categories();
        if(count($cart->items) == 0)  {
            return redirect("/cart/emptyCart");
        }else{
            return redirect("/cart/cartItems");   
        }
    }

    public function updateSize(Request $request, $id){
        if (!Session::has("cart")) {
            return view("cart.shoppingCart")->with(["products"=>null, "totalPrice"=>0,"totalQuantity"=>0, "tax" => 0]);
        }
        $oldCart = Session::get("cart");

        $cart = new Cart($oldCart);

        $cart->updateSize($id, $request["size"]);

        $request->session()->put("cart", $cart);

        return redirect("/cart/cartItems");  
    }
}
