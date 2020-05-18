<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductPost;
use App\Http\Requests\UpdateProductPut;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(8);
        return view('admin.products.index',compact('products'));
    }

    public function getProducts()
    {
        $products = Product::paginate(8);

        return view('admin.products.tableProducts',compact('products'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::where('status','activo')
        ->orderBy('name','ASC')
        ->pluck('name','id');

        return view('admin.products.create',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductPost $request)
    {
        //id_sub_category,code,name,purchase_price,sale_price,stock,descripcion,status
        $validate = $request->validated();
        $product = new Product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->id_sub_category = $request->id_sub_category;
        $product->save();
        return redirect()->route('get-product');
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

        return view('admin.products.show',compact('product'));
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
        $subcategories = SubCategory::where('status', 'activo')
        ->orderBy('name', 'ASC')
        ->pluck('name', 'id');


        return view('admin.products.edit',compact('product','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductPut $request, $id)
    {
        $validate = $request->validated();
        $product = Product::find($id);
        $product->code = $request->code;
        $product->name = $request->name;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->id_sub_category = $request->id_sub_category;
        $product->save();
        return redirect()->route('get-product');
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

        $product->delete();

        return redirect()->route('get-product');
    }
    public function deactivate(Request $request)
    {
        $product = Product::find($request->id);
        if($product->status =='inactivo'){
            $product->status = 'activo';
        }else{
            $product->status = 'inactivo';
        }
        $product->save();
        $products =Product::all();
        return view('admin.products.tableProducts')->with('products',$products)->render();


    }
}
