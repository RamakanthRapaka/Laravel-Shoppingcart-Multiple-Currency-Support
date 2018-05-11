<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Http\Controllers\CurrencyController as Convert;

use Cookie;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_COOKIE['CURRENCY']))
        {
        $curr = $_COOKIE['CURRENCY'];
        }
        else {
        $curr = '';    
        }
        $products = Product::all();
        return view('shop')->with(array('products' => $products, 'curr' => $curr));
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if(isset($_COOKIE['CURRENCY']))
        {
        $curr = $_COOKIE['CURRENCY'];
        }
        else {
        $curr = '';    
        }
        $product = Product::where('slug', $slug)->firstOrFail();
        $interested = Product::where('slug', '!=', $slug)->get()->random(4);

        return view('product')->with(['product' => $product, 'interested' => $interested, 'curr' => $curr]);
    }


}
