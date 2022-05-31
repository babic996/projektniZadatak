<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }
    public function store()
    {
        request()->validate([
           'name'=>'required',
           'manufacturer'=>'required',
           'country'=>'required'
        ]);

        Product::create([
           'name'=>request('name'),
            'manufacturer'=>request('manufacturer'),
            'serialNumber'=>request('serial_number'),
            'country'=>request('country'),
            'description'=>request('description')
        ]);

        return back();
    }
    public function index()
    {
        $products=Product::all();

        return view('product.index',['products'=>$products]);
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
    public function edit(Product $product)
    {
        return view('product.edit',['product'=>$product]);
    }
    public function update(Product $product)
    {
        request()->validate([
            'name'=>'required',
            'manufacturer'=>'required',
            'country'=>'required'
        ]);

        $product->name=request('name');
        $product->manufacturer=request('manufacturer');
        $product->serialNumber=request('serial_number');
        $product->country=request('country');
        $product->description=request('description');
        $product->update();

        return back();
    }
}
