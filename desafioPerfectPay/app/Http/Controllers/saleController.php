<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\salesStoreRequest;
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
            $valorvendido += $vendido->sale_amount;
            $qtyvendido += $vendido->qty;
        }
        foreach ($cancelados as $cancelado) {
            $valorcancelado += $cancelado->sale_amount;
            $qtycancelado += $cancelado->qty;
        }
        foreach ($devolvidos as $devolvido) {
            $valordevolvido += $devolvido->sale_amount;
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

    public function store(salesStoreRequest $request) {  //criar request especifico
        $data = $request->all();
        $saleModel = app(Sale::class);
        $sale = $saleModel->create([
            'product_id' => $data['product_id'] ,
            'customer_id'=> $data['customer_id'],
            'qty'=> $data['qty'],
            'discount'=> $data['discount'],
            'sale_amount'=> $data['sale_amount'],
            'status'=> $data['status'],
        ]);
        
        return redirect()->route('sale.index');
    }

    public function edit($id) {
        $customerModel = app(Customer::class);
        $customer = $customerModel->find($id);
        return view('Customers/editcustomers',compact('customer'));
    }

    public function update(Request $request,$id){ //criar resquest especifico
        $data = $request->all();
        $customerModel = app(Customer::class);
        $customer = $customerModel->find($id);
        $customer->update([
            'name'=> $data['name'],
            'description' => $data['description'] ,
            'price'=> $data['price'],
        ]);
        return redirect()->route('customer.index');
    }
    
}
