<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

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

    public function store(Request $request) {  //criar request especifico
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
    
    public function destroy($id) {
        if(!empty($id)){
            $customerModel = app(Customer::class);
            $customer = $customerModel->find($id);
            if(!empty($customer)){
                $customer->delete();
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
