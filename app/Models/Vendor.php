<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table= 'vendor_register';
    protected $fillable = [
        'vendor_name',
         'shop_name',
         'shop_email',
         'shop_address',
         'shop_city',
         'shop_state',
         'shop_country',
         'shop_pincode',
         'shop_mobile',
         'shop_address_proof',
         'shop_address_proof_image',
         'shop_business_license_number',
         'shop_pan_number',
        'shop_gstno',
        'v_wallet',
    ];
}
