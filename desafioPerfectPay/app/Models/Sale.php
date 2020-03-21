<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sale extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'qty', 'discount', 'sale_amount', 'status'
    ];

    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

}
