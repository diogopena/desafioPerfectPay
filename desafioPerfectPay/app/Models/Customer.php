<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'name', 'identification_type', 'identification_number', 'email'
    ];
    
    public function sales() {
        
        return $this->hasMany(Sale::class);

    }
    
}
