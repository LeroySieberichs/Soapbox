<?php

namespace App\Http\Controllers;

use Request;
use Session;
use Redirect;
use App\Models\product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            // get all the products
            $products = product::all();

            // load the view and pass the products
            return View::make('products.index')
                ->with('products', $products);
        } catch(\Illuminate\Database\QueryException $ex){ 

            return View::make('products.index')->withErrors($ex->getMessage());
        }   
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
        // validation rules creation
        $rules = array(
            'name'       => 'required',
            'quantity_in_stock'      => 'required|numeric',
            'price' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
        );
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('products')
                ->withErrors($validator);
        } else {
            $product = new product;
            $product->name = Request::get('name');
            $product->quantity_in_stock = Request::get('quantity_in_stock');
            $product->price = Request::get('price');

            // checks if the "total" input from the user is the multiplication of the price and quantity
            if(Request::get('total') != (Request::get('price') * Request::get('quantity_in_stock')) || Request::get('total') == null ){
                $product->total = Request::get('price') * Request::get('quantity_in_stock');
            } else {
                $product->total = Request::get('total');
            }
            $product->save();

            
            Session::flash('message', 'Product Created!');
            return Redirect::to('products');
        }
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
