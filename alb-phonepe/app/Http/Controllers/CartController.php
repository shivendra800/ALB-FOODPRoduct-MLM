<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
 

class CartController extends Controller
{

    public function add_to_cart(Request $request)
    {
      $product_id = $request->input('product_id');
      $product_qty = $request->input('product_qty');
      $cate_id = $request->input('cate_id');
      if(Auth::check())
      {
        $prod_check = Product::where('id',$product_id)->first();
        {
            if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
            {
                return response()->json(['status' => $prod_check->name."Already Added to cart "]);
            }else{
                $cartItem = new Cart();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $product_qty;
                $cartItem->cate_id = $cate_id;
                $cartItem->save();
                return response()->json(['status' => $prod_check->name." Added to cart "]);
            }
            
            
        }
      }else
      {
        return response()->json(['status'=>"Login to Continue"]);
      }
    }
    public function viewcart()
    {
      $cartItem =Cart::where('user_id',Auth::id())->get();
      return view('front.view_cart',compact('cartItem'));
    }
    public function deleteproduct(Request $request)
    { 
       
      
      if(Auth::check())
      {
        
        $prod_id = $request->input('prod_id');
        
        if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
          $cartItem = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
          $cartItem->delete();
          return response()->json(['status'=>"Product Deleted Successfully"]);
        }

      }else{
        return response()->json(['status'=>"Login to Continue"]);
      }

    }
    public function updatecart(Request $request)
    { 
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
      if(Auth::check())
      {
        
        if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
          $cart = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
          $cart->prod_qty = $product_qty;
          $cart->update();
          return response()->json(['status'=>"Quantity Updated"]);
        }

      }else{
        return response()->json(['status'=>"Login to Continue"]);
      }

    }

    public function cartcount()
    {
       $cartcount = Cart::where('user_id',Auth::id())->count();
       return response()->json(['count'=> $cartcount]);
    }

    // wishlist--------------------------
    public function wishlistcount()
    {
       $wishlsitcount = Wishlist::where('user_id',Auth::id())->count();
       return response()->json(['count'=> $wishlsitcount]);
    }

    public function addtowishlist(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
             $cate_id = $request->input('cate_id');
            if(Product::find($prod_id))
            {
                $wishlist = new Wishlist();
                $wishlist->prod_id = $prod_id;
                $wishlist->cate_id = $cate_id;
                $wishlist->user_id = Auth::id();
                $wishlist->save();
                return response()->json(['status' => "Product Added to wishlist "]);
            }
            else{
                return response()->json(['status' => "Product dose not exists "]);
            }


        }
        else
      {
        return response()->json(['status'=>"Login to Continue"]);
      }
    }
    public function viewwishlist()
    {
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
       return view('front.wishlist',compact('wishlist'));
    }
    public function deletewishlistitem(Request $request)
    {
        if(Auth::check())
      {
        $prod_id = $request->input('prod_id');
        if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
          $wishlist = Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
          $wishlist->delete();
          return response()->json(['status'=>"Item remove from from wishlist"]);
        }

      }else{
        return response()->json(['status'=>"Login to Continue"]);
      }

    }

}