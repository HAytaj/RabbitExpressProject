<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.country.index")->with("countries",Country::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.country.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request["name"] = strip_tags($request['name']);
        $this->validate($request, [
            "name"=>"required",
            "code"=>"required",
        ]);
        Country::create($request->all());
        return redirect("admin/country");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);
        if($country == null){
            return view("front.problem");
        }
        return view("admin.country.show")->with("country",$country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::find($id);
        if($country == null){
            return view("front.problem");
        }
        return view("admin.country.edit")->with("country",$country);
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
            "code"=>"required",
        ]);
        $country = Country::find($id);
        if($country == null){
            return view("front.problem");
        }
        $country["name"] = $request["name"];
        $country["code"] = $request["code"];
        $country->save();
        return redirect("admin/country");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        if($country == null){
            return view("front.problem");
        }

        $country->delete();

        return redirect("admin/country");
    }
}
