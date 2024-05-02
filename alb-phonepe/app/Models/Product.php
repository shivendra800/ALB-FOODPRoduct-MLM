<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
         'cate_id',
         'name',
         'slug',
         'small_description',
         'description',
         'cost_price',
         'original_price',
         'selling_price',
         'image',
         'qty',
         'original_qty',
         'tax',
         'status',
         'deals',
         'meta_title',
         'meta_description',
         'meta_keywords',
         'unit',
        
    ];
    public function category()
    {
    return $this->belongsTo(Category::class,'cate_id','id')  ;
    }

}
