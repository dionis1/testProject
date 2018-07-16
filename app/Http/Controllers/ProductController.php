<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{   
	public function index()
	{
      $products = Product::latest()
            ->paginate(15);

        return ProductResource::collection($products);
	}

    public function store(Request $request)
    {

    	$product = $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity'=>'required',
        ]);

        $product = new Product();

        $product->name =$request->name;
        $product->description =$request->description;
        $product->price =$request->price;
        $product->quantity =$request->quantity;

        $product->save();

        return new ProductResource($product);
  
     }
}
