<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function store(Request $request) {  //criar request especifico
        $data = $request->all();
        $productModel = app(Product::class);
        $product = $productModel->create([
            'name' => $data['name'],
            'description' => $data['description'] ,
            'price'=> $data['price'],
        ]);
        return redirect()->route('product.index');
    }

    public function edit($id) {
        $productModel = app(Product::class);
        $product = $productModel->find($id);
        return view('Products/editproducts',compact('product'));
    }

    public function update(Request $request,$id){ //criar resquest especifico
        $data = $request->all();
        $productModel = app(Product::class);
        $product = $productModel->find($id);
        $product->update([
            'name'=> $data['name'],
            'description' => $data['description'] ,
            'price'=> $data['price'],
        ]);
        return redirect()->route('product.index');
    }

    public function destroy($id) {
        
        if(!empty($id)){
            $productModel = app(Product::class);
            $product = $productModel->find($id);
            if(!empty($product)){
                $product->delete();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Produto deletado com sucesso.',
                    'reload'  => true,
                ]);
            }
            else{
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Produto não encontrado.',
                    'reload'  => true,
                ]);
            }
        }
        else{
            return response()->json([
                'status'  => 'error',
                'message' => 'ID não está na requisição',
                'reload'  => true,
            ]);

        }
    }  
}
