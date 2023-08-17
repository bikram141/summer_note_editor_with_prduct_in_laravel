<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title="Category List";
        $category=Category::get();
        return view('category.index',compact('category','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title="Category create form ";
        return view('category.add',compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $this->validate($request,[
            'Category_name'=>'required',
            'Description'=>'required'
        ]);

        Category::create([
            'Category_name'=>$request->get('Category_name'),
            'Description'=>$request->get('Description'),
            'Status'=>$request->get('Status'),
        ]);
        $request->session()->flash('alert-success', 'category added successfully');
        return redirect('category');
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
        $page_title="Category edit form";
        $category= Category::find($id);
        return view('category.edit',compact('category','page_title'));
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
        $this->validate($request,[
            'Category_name'=>'required',
            'Description'=>'required',
            
        ]);
        $category=Category::find($id);
        $category->Category_name=$request->get('Category_name');
        $category->Description=$request->get('Description');
        $category->Status=$request->get('Status');
        $category->save();
        $request->session()->flash('alert-success', 'category updated successfully');
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category= Category::find($id);
        $category->delete();
        $request->session()->flash('alert-danger',' deleted successfully');
        return redirect('category');
    }
}
