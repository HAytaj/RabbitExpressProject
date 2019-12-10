<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use Auth;
use App\Categories;
use App\City;
use App\Country;
class AddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::categories();
        return view("address.index")->with(["addresses"=>Address::all(),"categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!session('item_added_to_cart') || session('item_added_to_cart') == null){
            return redirect("/shirts")->with("error","Add a product to the cart, please");
        }
        else if(session('address_added') == true){
            return redirect("/cart/checkout");
        }
        $categories = Categories::categories();
        $cities = City::pluck("name","id");
        $countries = Country::pluck("name","id");
        return view("/address/create")->with(["categories"=>$categories,"cities"=>$cities,"countries"=>$countries]);
    }

    public function appropriateCities($id){
        $cities = City::where("country_id","=",$id)->get();

        if($cities != null)
        {
            return response()->json($cities);
        }
        else{
            return view("front.problem"); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request["address"] = strip_tags($request['address']);

       $this->validate($request,
        [
            "address" => "required|regex:/[^A-Za-z0-9]+/",
            "city_id"=>"required",
            "country_id"=>"required",
            "zip" => "required|regex:/^[1-9]\d*(?:\.\d+)?(?:[kmbt])?$/",
        ]
    );
        $address = new Address();
        $address->address = $request->input("address");
        $address->city_id    = $request->input("city_id");
        $address->country_id = $request->input("country_id");
        $address->zip     = $request->input("zip");
        //$address->save();
        Auth::user()->addresses()->save($address);
        session(['address_added' => true]);
        return redirect("/cart/checkout");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = Address::find($id);
        if($address == null){
            return view("front.problem");
        }
        return view("address.show")->with("address",$address);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $address = Address::find($id);
        if($address == null){
            return view("front.problem");
        }
        return view("address.edit")->with("address",$address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            "address" => "required",
            "city_id" => "required",
            "country_id" => "required",
            "zip" => "required",
        ]
    );

        $address = Address::find($id);
        if($address == null){
            return view("front.problem");
        }
        $address->address = $request->input("address");
        $address->city_id    = $request->input("city_id");
        $address->country_id = $request->input("country_id");
        $address->zip     = $request->input("zip");
        //$address->save();
        Auth::user()->addresses()->save($address);
        return redirect("/admin/address");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        if($address == null){
            return view("front.problem");
        }
        $address->delete();
        return redirect("/admin/address");
    }
}
