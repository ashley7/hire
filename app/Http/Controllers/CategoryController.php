<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::get();

        $data = [
            'categories'=>$categories,
            'title'=>'Categories'
        ];

        return view('expenses.categories')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
        ];

        $this->validate($request,$rules);

        $saveCategory = new Category();

        $saveCategory->name = $request->name;

        $saveCategory->description = $request->description;

        $saveCategory->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $data = [
            'category'=>$category,
            'title'=>'Edite category'
        ];

        return view('expenses.edit_category')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $category->name = $request->name;

        $category->description = $request->description;

        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
