<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($id)
    {
        $product= Product::where('id',$id)->where('status','0')->first();
        if($product)
        {
            $product_id = $product->id;
            $review = Review::where('user_id',Auth::id())->where('prod_id',$product_id)->first();
            if($review)
            {
                return view('front.edit_review',compact('review'));
            }
            else{
                $product_id = $product->id;
                $verified_purchases = Order::where('orders.user_id',Auth::id())
                ->join('order_items','orders.id','order_items.order_id')
                ->where('order_items.prod_id',$product_id)->get();
                return view('front.add_review',compact('product','verified_purchases'));
            }
              
        }
        else
        {
            return redirect()->back()->with('status',"This link you follow was broken");
        }
    }
    public function submit(Request $request)
    {
        $product_id = $request->input('product_id');
        $product =  Product::where('id',$product_id)->where('status','0')->first();
        if($product)
        {
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id'=> Auth::id(),
                'prod_id'=>$product_id,
                'user_review' =>$user_review
            ]);
            $category_slug = $product->category->slug;
            
            if($new_review)
            {
                return redirect('Product-detail/'.$product_id)->with('status',"Thank you for review ");
            }
        }
        else{
            return redirect()->back()->with('status',"This link you follow was broken");
        }
        
    }
    public function edit($id)
    {
        $product= Product::where('id',$id)->where('status','0')->first();
        if($product)
        {
              $product_id = $product->id;
              $review = Review::where('user_id',Auth::id())->where('prod_id',$id)->first();
              if($review)
              {
                return view('front.edit_review',compact('review'));
              }else
              {
                return redirect()->back()->with('status',"This link you follow was broken");
              }
               
             
        }
        else
        {
            return redirect()->back()->with('status',"This link you follow was broken");
        }
    }
    public function update(Request $request)
    {
        $user_review = $request->input('user_review');
         
        if($user_review != '')
        {
            $review_id = $request->input('review_id');
            $review = Review::where('id',$review_id)->where('user_id',Auth::id())->first();
            if($review)
            {
               $review->user_review = $request->input('user_review');
               $review->update();
               return redirect('Product-detail/'.$review->prod_id)->with('status' ,"Reveiw updated Successfully");
            }
             
        }
        else{
            return redirect()->back()->with('status',"You can not submit and emppty review");
        }
        
    }
}