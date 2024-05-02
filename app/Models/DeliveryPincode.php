<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPincode extends Model
{
    use HasFactory;

    public function deliveryboy()
    {
        return $this->belongsTo(Delivery::class,'delivery_boy_id','id');
    }
    
}
