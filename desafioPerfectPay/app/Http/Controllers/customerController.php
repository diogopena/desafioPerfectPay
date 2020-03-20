<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\customerRequest;
use App\Http\Requests\customerUpdateRequest;

class customerController extends Controller
{
    public function index() {
        
        $customerModel = app(Customer::class);
        $customers = $customerModel->all();
        return view('Customers/indexcustomers', compact('customers'));
    }

    public function create() {
        
        return view('Customers/createcustomers');               
    }

    public function store(customerRequest $request) {  //criar request especifico
        $data = $request->all();
        $customerModel = app(Customer::class);
        $customer = $customerModel->create([
            'name' => $data['name'],
            'identification_type' => $data['identification_type'] ,
            'identification_number'=> $data['identification_number'],
            'email'=> $data['email'],
        ]);
        return redirect()->route('customer.index');
    }

    public function edit($id) {
        
        $customerModel = app(Customer::class);
        $customer = $customerModel->find($id);
        return view('Customers/editcustomers',compact('customer'));
    }

    public function update(customerUpdateRequest $request,$id){ //criar resquest especifico
        $data = $request->all();
        $customerModel = app(Customer::class);
        $customer = $customerModel->find($id);
        $customer->update([
            'name' => $data['name'],
            'identification_type' => $data['identification_type'] ,
            /*
            'identification_number'=> $data['identification_number'],
            'email'=> $data['email'],
            */
        ]);
        return redirect()->route('customer.index');
    }
}
