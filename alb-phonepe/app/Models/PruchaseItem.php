<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\vendor;

class PruchaseItem extends Model
{
    use HasFactory;
    protected $table = 'purchase_items';
    protected $fillable = [
         'invoice_id',
         'vendor_id',
         'prod_id',
         'unit',
         'price',
         'qty',
         'tax',
         'total_price',
         'previous_balance',
         'total_billing',
         'grand_total',
         'paid_amount',
         'remaining_amount',
         
        
    ];
    public function product()
    {
    return $this->belongsTo(Product::class,'prod_id','id')  ;
    }
    public function vendor()
    {
    return $this->belongsTo(vendor::class,'vendor_id','id')  ;
    }
}
