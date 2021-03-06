<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\salesStoreRequest;
use App\Http\Requests\salesUpdateRequest;
use App\Http\Requests\searchRequest;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;


class saleController extends Controller
{

    public function index() {

        $customerModel = app(Customer::class);
        $customers = $customerModel->all();
        $productModel = app(Product::class);
        $products = $productModel->all();
        $saleModel = app(Sale::class);
        $sales = $saleModel->all();
        
        return view('Sales/indexsales', compact('customers','products','sales'));
    }

    /*
    public function show($id) {
        
        dd($request);   
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
        
        $qtyvendido = $vendidos->count();
        $qtycancelado = $cancelados->count();
        $qtydevolvido = $devolvidos->count();
        
        $valorvendido = 0;
        $valorcancelado = 0;
        $valordevolvido = 0;

        foreach ($vendidos as $vendido) {
            $valorvendido += $vendido->sale_amount;
        }
        foreach ($cancelados as $cancelado) {
            $valorcancelado += $cancelado->sale_amount;
        }
        foreach ($devolvidos as $devolvido) {
            $valordevolvido += $devolvido->sale_amount;
        }

        return view('Sales/indexsales', compact('products','customers','sales','valorvendido','valordevolvido','valorcancelado','qtyvendido','qtycancelado','qtydevolvido'));
    }
    */

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
        $sale->discount = (1 - ($data['discount']/100));
        $sale->sale_amount = ($product->price)*($sale->qty)*($sale->discount);
        $sale->status = $data['status'];
        $sale->customer()->associate($customer);
        $sale->product()->associate($product);
        $sale->save();
        
        return redirect()->route('sale.index');
    }
    
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

        $sale->qty = $data['qty'];
        //$sale->discount = (1 - ($data['discount']/100));
        $sale->sale_amount = ($sale->product->price)*($sale->qty)*($sale->discount);
        $sale->status = $data['status'];

        $sale->update();
        return redirect()->route('sale.index');
    }

    public function search(searchRequest $request) {
        
        $id = $request->id;
        $dateFrom = $request->DE;
        $dateTo = $request->ATE;

        $dateSearchFROM = Carbon::createFromFormat('d-m-Y', $dateFrom)
            ->tz('UTC')
            ->toDateString();
            
        $dateSearchTO = Carbon::createFromFormat('d-m-Y', $dateTo)
            ->tz('UTC')
            ->toDateString();
        
        

        $productModel = app(Product::class);
        $customerModel = app(Customer::class);
        $saleModel = app(Sale::class);
        $client = $customerModel->find($id);
        $products = $productModel->all();
        $customers = $customerModel->all();
        $sales = $saleModel->where([
            ['customer_id','=', $id],
            ['created_at','>=',$dateSearchFROM],
            ['created_at','<=',$dateSearchTO],
            ])->get();
        
        //Tabela de resultado de vendas
        $vendidos = $saleModel
        ->where([
            ['customer_id','=', $id],
            ['created_at','>=',$dateSearchFROM],
            ['created_at','<=',$dateSearchTO],
            ['status','=', 'Vendido'],
            ])->get();

        $cancelados = $saleModel->where([
            ['customer_id','=', $id],
            ['created_at','>=',$dateSearchFROM],
            ['created_at','<=',$dateSearchTO],
            ['status','=', 'Cancelada'],
            ])->get(); 

        $devolvidos = $saleModel->where([
            ['customer_id','=', $id],
            ['created_at','>=',$dateSearchFROM],
            ['created_at','<=',$dateSearchTO],
            ['status','=', 'Devolvida'],
            ])->get();
        
        $qtyvendido = $vendidos->count();
        $qtycancelado = $cancelados->count();
        $qtydevolvido = $devolvidos->count();
        
        $valorvendido = 0;
        $valorcancelado = 0;
        $valordevolvido = 0;

        foreach ($vendidos as $vendido) {
            $valorvendido += $vendido->sale_amount;
        }
        foreach ($cancelados as $cancelado) {
            $valorcancelado += $cancelado->sale_amount;
        }
        foreach ($devolvidos as $devolvido) {
            $valordevolvido += $devolvido->sale_amount;
        }

        return view('Sales/indexsalesResults', compact('client','dateFrom','dateTo','id','products','customers','sales','valorvendido','valordevolvido','valorcancelado','qtyvendido','qtycancelado','qtydevolvido'));
    }
    
}
