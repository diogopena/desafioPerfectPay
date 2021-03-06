<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class salesStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'product_id' => 'required' ,
            'customer_id'=> 'required',
            'discount' => 'required|integer|between:0,100',
            'qty'=> 'required|integer',
            'status'=> 'required',
        ];
    }
}
