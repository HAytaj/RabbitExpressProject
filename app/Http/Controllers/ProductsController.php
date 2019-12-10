<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Storage;
use App\Review;
use File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.product.index")->with("products",Product::orderBy("created_at")->paginate(4));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck("name","id"); 
        return view("admin.product.create")->with("categories",$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ["name" => "required", "price"=>"required","description" => "required|max:200","size"=>"required","category_id" => "required",
        "image_name"=>"image|required|max:10000"]);
        
        if ($request->hasFile("image_name")) {
            
            // Get FIle Name With Extension
            $fileNameWithExtension = $request->file("image_name")->getClientOriginalName();

            // Get Just File Name
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file("image_name")->getClientOriginalExtension();

            //File Name to store
            $fileNameToStore = $fileName."_".time().".".$extension;

            //save file
            $request->file("image_name")->move('product_images/', $fileNameToStore);
        }else{
            $fileNameToStore = "noImage.jpg";
        }

        $product = new Product();
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->size = $request->input("size");
        $product->price = $request->input("price");
        $product->category_id=$request->input("category_id");
        $product->image_name = $fileNameToStore;
        $product->save();
        return redirect("/admin/product")->with("success","Product Created.");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if($product == null)
        {
            return view("front.problem");
        }
        return view("admin.product.show")->with(["product"=>$product,"product_rating" =>$product->reviews()->avg("rating")]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if($product == null)
        {
            return view("front.problem");
        }
        $categories = Category::pluck("name","id"); 
        return view("admin.product.edit")->with(["product"=>$product,"categories"=>$categories]);
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
         ["name" => "required|max:50", "price"=>"required","description" => "required|max:200","size"=>"required","category_id" => "required"]);
        $product = Product::find($id);
        if($product == null)
        {
            return view("front.problem");
        }
        if ($request->hasFile("image_name")) {
            
            // Get FIle Name With Extension
            $fileNameWithExtension = $request->file("image_name")->getClientOriginalName();

            // Get Just File Name
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file("image_name")->getClientOriginalExtension();

            //File Name to store
            $fileNameToStore = $fileName."_".time().".".$extension;

            //save file
            $request->file("image_name")->move('product_images/', $fileNameToStore);
            $product->image_name = $fileNameToStore;
        }

        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->size = $request->input("size");
        $product->price = $request->input("price");
        $product->category_id=$request->input("category_id");
        $product->save();

        return redirect("/admin/product")->with("success","Product Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product == null)
        {
            return view("front.problem");
        }
        $path = public_path() . '/product_images'."/".$product->image_name;
        if ($product->image_name !== "noImage.jpg") {
            if(File::exists($path)) {
                File::delete($path);
            }
        }
        
        $product->delete();
        return redirect("/admin/product")->with("success","Product Deleted.");
    }
}
