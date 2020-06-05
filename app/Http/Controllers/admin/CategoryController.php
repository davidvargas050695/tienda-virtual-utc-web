<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryPost;
use App\Http\Requests\UpdateCategoryPut;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(8);

        return view('admin.categories.index',compact('categories'));
    }

    public function getCategories($id)
    {
        $categories = Category::where('id_company',$id)->get();


        return view('admin.categories.tableCategorie',compact('categories'))->render();
    }

    public function getApiCategories()
    {
        $categories = Category::where('status','activo')->paginate(8);
        return response()->json(['categories'=>$categories],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$validate = $request->validated();
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->id_company = $request->id;
        $category->save();
        return $category;
        //return redirect()->route('get-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::paginate(8);

        return view('admin.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryPut $request, $id)
    {
        $validate = $request->validated();
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('get-category');
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

        $category->delete();

        return redirect()->route('get-category');
    }
    public function deactivate(Request $request)
    {
        $category = Category::find($request->id);
        if($category->status =='inactivo'){
            $category->status = 'activo';
        }else{
            $category->status = 'inactivo';
        }
        $category->save();
        $categories =Category::all();
        return view('admin.categories.tableCategorie')->with('categories',$categories)->render();


    }
}
