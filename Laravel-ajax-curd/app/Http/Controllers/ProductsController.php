<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductsModel;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd($request);
        $products = $request->validate(['product_name'=>'required','category_id' =>'required','price' =>'required','colore' =>'required','size' =>'required','products_details' =>'required','image'=>'required']);
        // dd($category);
        // $filename = $request->file('image')->getClientOriginalName();
        // // dd( $products );
        //         $extension = $request->file('image')->getClientOriginalExtension();
        //         $fileNameToStore = 'dumy.jpeg';              
        //         $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
        //         $data['image'] = $fileNameToStore;
       $data = ProductsModel::create($products);
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
