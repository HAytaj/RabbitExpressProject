<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Country;
class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.city.index")->with("cities",City::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.city.create")->with("countries",Country::pluck("name","id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {$request["name"] = strip_tags($request['name']);
        $this->validate($request, [
            "name"=>"required",
            "country_id"=>"required",
        ]);
        City::create($request->all());
        return redirect("admin/city");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        if($city == null){
            return view("front.problem");
        }
        return view("admin.city.show")->with("city",$city);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $city = City::find($id);
        if($city == null){
            return view("front.problem");
        }
        return view("admin.city.edit")->with(["city"=>$city,"countries"=>Country::pluck("name","id")]);
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
        $request["name"] = strip_tags($request['name']);
        $this->validate($request, [
            "name"=>"required",
            "country_id"=>"required",
        ]);
        $city = City::find($id);
        if($city == null){
            return view("front.problem");
        }
        $city["name"] = $request["name"];
        $city["country_id"] = $request["country_id"];
        $city->save();
        return redirect("admin/city");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        if($city == null){
            return view("front.problem");
        }

        $city->delete();

        return redirect("admin/city");
    }
}
