<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverdOrderbyDevBoy extends Model
{
    use HasFactory;
    
     public function orders()
    {
    return $this->belongsTo('App\Models\Order'::class,'order_id','id')  ;
    }
}
