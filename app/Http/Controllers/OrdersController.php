<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Categories;

class OrdersController extends Controller
{

    public function index($type = ''){
        $categories = Categories::categories();
        if($type == 'pending'){
            $orders = Order::where('delivered',"0")->get();
        }
        else if($type == 'delivered'){
            $orders = Order::where('delivered',"1")->get();
        }
        else{
            $orders = Order::all();
        }
        return view("admin.orders")->with(["orders"=>$orders,"categories"=>$categories]);
    }

    public function changeOrderStatus(Request $request, $orderId){
        $order = Order::find($orderId);
        if($order == null){
            return view("front.problem");
        }
        if($request["delivered"] == null)
        {
            $order->delivered = "0";

        }
        else{
            $order->delivered = 1;
        }
       
        $order->save();
        return back();
    
    }
}
