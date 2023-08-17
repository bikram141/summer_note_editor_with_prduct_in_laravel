<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title="product List";
        $product=Product::with('category')->get();
        return view('product.index',compact('product','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title="product create form";
        return view('product.add',compact('page_title'));
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
            'Product_name'=>'required',
            'cat_id'=>'required',
            'Product_image'=>'required|mimes:png,jpeg,jpg',
            'Price'=>'required',
            'manufacture'=>'required',
            'publish_date'=>'required',
            'Description'=>'required',
            'Status'=>'required',
        ]);
        $image=$request->file('Product_image');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);

        $product=new Product();
        $product->Product_name=$request->get('Product_name');
        $product->cat_id=$request->get('cat_id');
        $product->Product_image=$name;
        $product->Price=$request->get('Price');
        $product->manufacture=json_encode($request->get('manufacture'));
        $product->publish_date=$request->get('publish_date');
        $product->Description=$request->get('Description');
        $product->Status=$request->get('Status');
        $product->save();
        $request->session()->flash('alert-success', 'product added successfully');
        return redirect('product');
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
        $page_title="product edit";
        $product= Product::find($id);
        return view('product.edit',compact('product','page_title'));
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
            'Product_name'=>'required',
            'cat_id'=>'required',
            'Product_image'=>'required|mimes:png,jpeg,jpg',
            'Price'=>'required',
            'manufacture'=>'required',
            'publish_date'=>'required',
            'Description'=>'required',
            'Status'=>'required',
        ]);
        $product=Product::find($id);
        $name=$product->Product_image;
        if($request->hasFile('Product_image')){
            $image=$request->file('Product_image');
            $name=time().'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images');
            $image->move($destinationPath,$name);
        }
        $product->Product_name=$request->get('Product_name');
        $product->cat_id=$request->get('cat_id');
        $product->Product_image=$name;
        $product->Price=$request->get('Price');
        $product->manufacture=json_encode($request->get('manufacture'));
        $product->publish_date=$request->get('publish_date');
        $product->Description=$request->get('Description');
        $product->Status=$request->get('Status');
        $product->save();
        $request->session()->flash('alert-success', 'product updated successfully');
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product= Product::find($id);
        $product->delete();
        $request->session()->flash('alert-danger',' deleted successfully');
        return redirect('product');
    }
}
