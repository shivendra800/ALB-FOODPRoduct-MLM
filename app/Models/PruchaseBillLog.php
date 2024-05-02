<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruchaseBillLog extends Model
{
    use HasFactory;
    protected $table = 'purchase_bill_logs';
    protected $fillable = [
         'invoice_id',
         'vendor_id',
         'previous_balance',
         'total_billing',
         'grand_total',
         'paid_amount',
         'remaining_amount',
         
        
    ];
}
