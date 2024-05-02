<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
     
        'order_id',
        'prod_id',
        'price',
        'qty',
        
    ];
    public function product() : BelongsTo
    {
    return $this->belongsTo(product::class,'prod_id','id')  ;
    }
}
