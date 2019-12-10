<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Http\Request;
use App\Categories;
use App\Product;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = [];
        $selectCategories = Category::pluck("name","id");
        return view("admin.category.index")->with(["products"=>$products,"categories"=> $categories, "selectCategories"=>$selectCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect("admin/categories");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,["name" => "required"]);

        $category = new Category();

        $category->name=$request["name"];
        $category->parent_id=$request["parent_id"] == null ? 0 : $request["parent_id"];
        $category->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=0)
    {
        $categories = Category::all();
        $selectCategories = Category::pluck("name","id");

        if($id!=0){
            $category = Category::find($id);
            if($category == null){
                return view("front.problem");
            }
            $products = $category->products()->get();
        }
      
        return view("admin.category.index",compact(["products","categories","selectCategories"]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect("admin/categories");
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
        $this->validate($request,["name" => "required"]);

        $category = Category::find($id);

        if($category == null){
            return view("front.problem");
        }

        $category->name=$request["name"];
        $category->parent_id=$request["parent_id"] == null ? 0 : $request["parent_id"];
        $category->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category == null){
            return view("front.problem");
        }
        if((count(Product::where("category_id", "=",$id)->get()) >= 1) || (count(Category::where("parent_id", "=",$id)->get()) >= 1))
        {
            return redirect("admin/categories")->with("error","This category is being using.");
        }
        $category->delete();
        return redirect("admin/categories");
    }
}
