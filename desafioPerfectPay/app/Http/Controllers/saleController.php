<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Customer;


class saleController extends Controller
{
    public function index() {

        $customerModel = app(Customer::class);
        $customers = $customerModel->all();
        
        return view('Sales/indexsales', compact('customers'));
    }

    public function show($id) {

        $customerModel = app(Customer::class);
        $customers = $customerModel->all();
        $saleModel = app(Sale::class);
        $sales = $saleModel->where(['customer_id' => $id])->get();
        $info = [
            'status' => 11111,
            'teste' => 22222,
            'teste2' => 33333
        ];

        return view('Sales/indexsalescustomer', compact('customers','sales','info'));
}

    public function create() {
        
        return view('Sales/createsales');               
    }

    public function store(Request $request) {  //criar request especifico
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
        return redirect()->route('sales.index');
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
