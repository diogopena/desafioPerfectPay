<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\salesStoreRequest;
use App\Http\Requests\salesUpdateRequest;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;


class saleController extends Controller
{
    public function index() {

        $customerModel = app(Customer::class);
        $customers = $customerModel->all();
        
        return view('Sales/indexsales', compact('customers'));
    }

    public function show($id) {
        
        //Tabela de vendas
        $productModel = app(Product::class);
        $products = $productModel->all();
        $customerModel = app(Customer::class);
        $customers = $customerModel->all();
        $saleModel = app(Sale::class);
        $sales = $saleModel->where(['customer_id' => $id])->get();
        //$sales = $customerModel->sales();

         
        //Tabela de resultado de vendas
        $vendidos = $saleModel->where([
            'status' => 'Vendido',
            'customer_id' => $id
            ])->get();

        $cancelados = $saleModel->where([
            'status' => 'Cancelada',
            'customer_id' => $id
            ])->get(); 

        $devolvidos = $saleModel->where([
            'status' => 'Devolvida',
            'customer_id' => $id
            ])->get();
        
        $qtyvendido = 0;
        $qtycancelado = 0;
        $qtydevolvido = 0;    
        $valorvendido = 0;
        $valorcancelado = 0;
        $valordevolvido = 0;

        foreach ($vendidos as $vendido) {
            $valorvendido += ($vendido->qty * $vendido->sale_amount);
            $qtyvendido += $vendido->qty;
        }
        foreach ($cancelados as $cancelado) {
            $valorcancelado += ($cancelado->qty * $cancelado->sale_amount);
            $qtycancelado += $cancelado->qty;
        }
        foreach ($devolvidos as $devolvido) {
            $valordevolvido += ($devolvido->qty * $devolvido->sale_amount);
            $qtydevolvido += $devolvido->qty;
        }

        return view('Sales/indexsalescustomer', compact('products','customers','sales','valorvendido','valordevolvido','valorcancelado','qtyvendido','qtycancelado','qtydevolvido'));
}

    public function create() {
        
        $productModel = app(Product::class);
        $products = $productModel->all();
        $customerModel = app(Customer::class);
        $customers = $customerModel->all();
        return view('Sales/createsales', compact('products','customers'));
                      
    }
    
    public function store(salesStoreRequest $request) { 
    
        $data = $request->all(); 
        
        $customer = Customer::find($data['customer_id']);
        $product = Product::find($data['product_id']);
        
        $sale = app(Sale::class);

        $sale->qty = $data['qty'];
        $sale->discount = $data['discount'];
        $sale->sale_amount = $data['sale_amount'];
        $sale->status = $data['status'];
        $sale->customer()->associate($customer);
        $sale->product()->associate($product);
        $sale->save();
        
        return redirect()->route('sale.index');
    }
    /*
    public function edit($id) {
        $productModel = app(Product::class);
        $products = $productModel->all();
        $customerModel = app(Customer::class);
        $customers = $customerModel->all();
        $saleModel = app(Sale::class);
        $sale = $saleModel->find($id);
        return view('Sales/editsales',compact('sale','products','customers'));
    }

    public function update(salesUpdateRequest $request, $id){
        $data = $request->all();
        $saleModel = app(Sale::class);
        $sale = $saleModel->find($id);
        $sale->update([
            'qty'=> $data['qty'],
            'discount'=> $data['discount'],
            'sale_amount'=> $data['sale_amount'],
            'status'=> $data['status'],
        ]);
        return redirect()->route('sale.index');
    }
    */
}
