<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $all_product = Product::where('cate_id','!=','9')->take(8)->get();
        $comboproduct = Product::where('cate_id','9')->take(4)->get();
       
        return view('front_home',compact('all_product','comboproduct'));
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function all_category()
    {
        $category = Category::get();
        return view('front.all_category',compact('category'));
    }
    public function category_product($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category = Category::where('slug',$slug)->first();
            $product = Product::where('cate_id',$category->id)->get();
            return view('front.category_product',compact('category','product'));
        }
        else{
            return redirect('/')->with('status',"Slug is not exists");
        }
        
        return view('front.all_category', compact('category'));
    }
    public function productdetails($id)
    {
        
        
            if(Product::where('id',$id)->exists())
            {
                $product = Product::where('id',$id)->first();
                //Get Similar Products
                 $similarProduct =Product::with('category')->where('cate_id', $product['category']['id'])->where('id','!=',$id)->limit(4)->inRandomOrder()->get()->toArray();
                //   dd($similarProduct);
                // Set Session for Recently Viewed Product
                if(empty(Session::get('session_id'))){
                    $session_id = md5(uniqid(rand(),true));
                }
                else{
                    $session_id=Session::get('session_id');
                }
                Session::put('session_id',$session_id);
                //Insert Recent view Product if it not exist
                $countRecentlyViewPrdocts=DB::table('recently_viewed_products')->where(['product_id'=>$id,'session_id'=>$session_id])->count();
                if($countRecentlyViewPrdocts==0)
                {
                    DB::table('recently_viewed_products')->insert(['product_id'=>$id,'session_id'=>$session_id]);
                }
               //Get Recently Viewed Products
               $recentlyProductIds=  DB::table('recently_viewed_products')->select('product_id')->where('product_id','!=',$id)->where('session_id',$session_id)->inRandomOrder()->get()->take(8)->pluck('product_id');
               //dd( $recentlyProductIds);
               $similarViewProduct =Product::with('category')->whereIn('id',$recentlyProductIds)->where('id','!=',$id)->get();
               //rating
               $rating = Rating::where('prod_id',$product->id)->get();
               $rating_sum = Rating::where('prod_id',$product->id)->sum('stars_rated');
               
               if($rating->count()>0)
                {
                    $rating_value = $rating_sum/$rating->count();
                }
               else{

                    $rating_value =0;
               }
               $user_rating = Rating::where('prod_id',$product->id)->where('user_id',Auth::id())->first(); 
               //review product
               $review = Review::where('prod_id',$product->id)->get();
                
               return view('front.product_details',compact('product','similarProduct','similarViewProduct','user_rating','rating','rating_value','review'));
                

            }else{
                return redirect('/')->with('status',"This link was broken");
            }


    }
    public function my_order()
    {
        $orders = Order::where('user_id',Auth::id())->get();
        return view('front.my_orders',compact('orders'));
    }
    public function view_order_details($id)
    {
        
        $orders = Order::where('orders.id',$id)->where('orders.user_id',Auth::id())->select('orders.*','tbl_city.cityName','tbl_state.stateName')
        ->join('tbl_city','tbl_city.id','=','orders.city')->join('tbl_state','tbl_state.id','=','orders.state')->first();
        return view('front.my_orders_details',compact('orders'));
    }
}
