<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\productRequest;
use App\Http\Requests\productUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;

class productController extends Controller
{
    
    public function index() {
        
        $productModel = app(Product::class);
        $products = $productModel->all();
        return view('Products/indexproducts', compact('products'));
    }

    public function create() {
        
        return view('Products/createproducts');               
    }

    public function store(productRequest $request) {
        $data = $request->all();
        $productModel = app(Product::class);
        $product = $productModel->create([
            'name' => $data['name'],
            'description' => $data['description'] ,
            'price'=> $data['price'],
        ]);
        return redirect()->route('product.index')->with('status', 'Produto criado com Sucesso!');
    }

    public function edit($id) {
        $productModel = app(Product::class);
        $product = $productModel->find($id);
        return view('Products/editproducts',compact('product'));
    }

    public function update(productUpdateRequest $request,$id){
        $data = $request->all();
        $productModel = app(Product::class);
        $product = $productModel->find($id);
        $product->update([
            'description' => $data['description'] ,
            'price'=> $data['price'],
        ]);
        return redirect()->route('product.index')->with('status', 'Produto editado com Sucesso!');
    }

    public function destroy($id) {

        $productModel = app(Product::class);
        $product = $productModel->find($id);
        $product->delete();
        return redirect()->route('product.index')->with('status', 'Produto DELETADO com Sucesso!');
    }
}