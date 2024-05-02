<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
     
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'payment_status',
        'pincode',
        'total_price',
        'payment_id',
        'payment_mode',
        'status',
        'message',
        'tracking_no',
        'deliveryboyID',
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
      public function orders_products()
    {
         return  $this->hasMany('App\Models\OrderItem','order_id')->with('product');
    }
     public function getuser()
    {
        return $this->belongsTo('App\Models\User','user_id','id' );
    }
     
}
