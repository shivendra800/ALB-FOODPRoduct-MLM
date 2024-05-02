<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    use HasFactory;
     public function category()
    {
    return $this->belongsTo('App\Models\Category'::class,'cate_id','id')  ;
    }

    public function product()
    {
    return $this->belongsTo('App\Models\Product'::class,'prod_id','id')  ;
    }
}
