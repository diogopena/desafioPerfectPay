<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sale extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'product_id', 'customer_id', 'qty', 'discount', 'sale_amount', 'status'
    ];
}
