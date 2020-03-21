<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'name', 'description', 'price'
    ];

    public function sales() {
        
        return $this->hasMany(Sale::class);

    }

}
