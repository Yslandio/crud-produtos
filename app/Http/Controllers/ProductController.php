<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show() {
        // $products = [
        //     ['id' => 1, 'name' => 'Headset', 'price' => 340, 'description' => 'Whatever'],
        //     ['id' => 2, 'name' => 'Mouse', 'price' => 120, 'description' => 'Gamer']
        // ];
        // $products = json_encode($products);
        // $products = json_decode($products);

        $products = Product::all();

        return view('show', ['products' => $products]);
    }

    public function create() {
        return view('create');
    }

    public function update(Request $request) {
        if ($product = Product::find($request->id)) {
            return view('update', ['product' => $product]);
        }

        return back()->withError('Product not found!');
    }



    public function rules($request) {
        $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'description' => ['nullable']
        ]);
    }

    public function store(Request $request) {
        $this->rules($request);

        if (Product::create($request->except('_token'))) {
            return redirect()->route('show')->with('success', 'Successful creation!');
        }

        return back()->withError('Error creating!');
    }

    public function put(Request $request) {
        $this->rules($request);

        if (Product::find($request->id)->update($request->except('_token'))) {
            return redirect()->route('show')->with('success', 'Successful edit!');
        }

        return back()->withError('Error edit!');
    }

    public function delete(Request $request) {
        if (Product::find($request->id)->delete()) {
            return redirect()->route('show')->with('success', 'Successful delete!');
        }

        return back()->withError('Error delete!');
    }
}
