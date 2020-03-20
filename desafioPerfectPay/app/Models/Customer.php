<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable;

    protected $primaryKey = 'identification_number';
    
    protected $fillable = [
        'name', 'identification_type', 'identification_number', 'email'
    ];

    public function sales() {
        
        return $this->hasMany('App\Models\Sale');

    }
}
