<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class Checkoutcontroller extends Controller
{
    public function checkout()
    {
        // $old_cartItem = Cart::where('user_id',Auth::id())->get();
        // foreach($old_cartItem as $item)
        // {
        //     if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists()){
        //         $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
        //         $removeItem->delete();
        //     }
        // }
        $getpreviousdata = User::where('users.id',Auth::id())->select('tbl_state.stateName','tbl_city.cityName','users.state','users.city')
        ->join('tbl_city','tbl_city.id','=','users.city')->join('tbl_state','tbl_state.id','=','users.state')->first();
        $cartItem = Cart::where('user_id',Auth::id())->get();
         $userdata = User::where('users.id',Auth::id())->first();
        $state = DB::table('tbl_state')->get();
        $comboitem = Cart::where('user_id',Auth::id())->where('cate_id','9')->first();
        return view('front.checkout',compact('cartItem','state','getpreviousdata','comboitem','userdata'));
    }
  

    public function placeorder(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'payment_mode' => 'required',
            'area' =>'required',
           
            
        ]);

     
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->area = $request->input('area');
        $order->pincode = $request->input('pincode');
        $order->payment_mode = $request->input('payment_mode');
        $order->status = 'Pending';
        if( $order->payment_mode == 'COD'){
            $order->payment_status	 = 'Unpaid';
                //level income code 
                $comboitem = Cart::where('user_id',Auth::id())->where('cate_id','9')->first();
                if($comboitem != null)
                {
                    $request->validate([
                        'sponser_id' => 'required',
                    ]);
                    $isExistsamesponser = User::where('id',Auth::id())->first();
                    if($isExistsamesponser->member_id == $request->input('sponser_id'))
                    {
                        return redirect('/checkout')->with('status',"You can not use Your MemebrID is as sponser id!!");
                    }
                    $getuserid = User::where('member_id',$request->input('sponser_id'))->where('level_status',1)->first();
                    if($getuserid != null || $getuserid != "")
                    {
                        if($comboitem->cate_id = '9'){
                            $users = User::where('id', Auth::id())->first();
                            $users->order_combo_product_date = Carbon::now()->format('Y-m-d');
                            $users->sponser_id =  $request->input('sponser_id');
                            $users->parent_id =$getuserid['id'];
                            $users->update();
                        }else{
                            $users = User::where('id', Auth::id())->first();
                            $users->parent_id =0;
                            $users->update();
                        }

                    }
                    else{
                        return redirect('/checkout')->with('status',"The Sponsor Is (not match)/(Level Status Is InActive) our Records!");
                    }
            }
            // end code level

            
        }
        else{
            $order->payment_status	 = 'Paid';

                    //level income code 
                  
                                $getuserid = User::where('member_id',$request->input('sponser_id'))->where('level_status',1)->first();
                                $users = User::where('id', Auth::id())->first();
                                $users->order_combo_product_date = Carbon::now()->format('Y-m-d');
                                if($request->input('sponser_id') != null || $request->input('sponser_id') != "")
                                {
                                    $users->sponser_id =  $request->input('sponser_id');
                                    $users->parent_id =$getuserid['id'];
                                }
                                                              
                                $users->update();
                           
                    // end code level


           
        
        }
        $order->payment_id = $request->input('payment_id');
        $order->tracking_no = 'OID'.rand(1111,9999);
        $total = 0;
        $cartItem_total = Cart::where('user_id',Auth::id())->get();
        foreach($cartItem_total as $prod)
        {
            $total += $prod->product->selling_price * $prod->prod_qty;
        }
        $order->total_price = $total;
        $order->totalwithgst = $request->totalwithgst;
        $order->gstamt = $request->gstamt;
        $order->gstpercentage = $request->gstpercentage;
        
        $order->save();
        $order->id;
        $cartItem = Cart::where('user_id',Auth::id())->get();

          ///
       

         




        foreach($cartItem as $item)
        {
           OrderItem::create([
              'order_id'=> $order->id,
              'prod_id'=> $item->prod_id,
              'qty'=> $item->prod_qty,
              'price'=> $item->product->selling_price,
           ]);
           $prod = Product::where('id',$item->prod_id)->first();
           $prod->qty = $prod->qty - $item->prod_qty;
           $prod->update();


         
        
    
          
        }
        // if(Auth::user()->address1 ==null)
        // {
           $user = User::where('id', Auth::id())->first();
           $user->name = $request->input('fname');
           $user->lname = $request->input('lname');
           $user->phone = $request->input('phone');
           $user->address1 = $request->input('address1');
           $user->address2 = $request->input('address2');
           $user->city = $request->input('city');
           $user->state = $request->input('state');
           $user->area = $request->input('area');
          
           $user->pincode = $request->input('pincode');
           $user->state = $request->input('state');
           $user->update();
           
        // }

        $cartItem = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartItem);
        
        
        
        $getuserforsendemail = User::where('id', Auth::id())->first();
        $getorderitemforemail = OrderItem::where('order_id', $order->id)->get()->toArray();
        $orderDetails = Order::with('orders_products')->where('id',$order->id)->first()->toArray();
        $Details = $cartItem;
              // dd($Details);
              
                $email = $getuserforsendemail['email'];
        //php mailer core on spam
        $name= $getuserforsendemail['name'];
        $ordernoid = $order->id;
        $item_tracking_number       = $order->tracking_no;
        
        $order_details =  $Details;
        $totalamoutwithgst = $orderDetails['totalwithgst'];
        
        $subject = "Orders Placed";

            $from = "info@albfoodproducts.in";
            
            $message = "
            
               
                    <tr><td>&nbsp;</td></tr><br></br>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>Hello $name</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>Your Order # $item_tracking_number   status Has Been Updated to  Order placed Successfully</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    
                    <td>INR  $totalamoutwithgst </td>
 
                     
                     
                              
                 
                           
                           
                               
                           
                         
            ";
            
            $headers = "From: $from \r\n";
            
            $headers .= "Content-type: text/html\r\n";
            
            
            mail($email,$subject,$message,$headers);
        
              
              
        $email = $getuserforsendemail['email'];
        $messageData =[
            'email' =>$email,
            'name' =>$getuserforsendemail['name'],
            'order_id' => $order->id,
            'order_details' =>  $Details,
            'order_status' => "Order placed Successfully",
            
            'item_tracking_number' => $order->tracking_no,
            'total_price' =>$total,
        ];
        Mail::send('mail.place_order_status',$messageData,function($message)use($email){
            $message->to($email)->subject('Order Status Updated- ALB Food Prdouct');
        });
        if($request->input('payment_mode')=="Paid by Razorpay")
        {

            
            return response()->json(['status'=>"Order placed Successfully"]);
        }

        return redirect('/')->with('status',"Order placed Successfully");


    }
    public function razorpaycheck(Request $request)
    {

 
      
        $cartItem =Cart::where('user_id',Auth::id())->get();
         $total_price = 0;
         foreach($cartItem as $item){
            $total_price += $item->product->selling_price * $item->prod_qty;
         }
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city = $request->input('city');
        $state = $request->input('state');
              
        $pincode = $request->input('pincode');
         
        $sponser_id = $request->input('sponser_id');
        
         $gstamt = $request->input('gstamt');
        $gstpercentage = $request->input('gstpercentage');
        $totalwithgst = $request->input('totalwithgst');
        
          $area= $request->input('area');
         
         

        return response()->json([
            'firstname' =>  $firstname,
            'lastname' =>  $lastname,
            'phone' =>  $phone,
            'email' =>  $email,
            'address1' =>  $address1,
            'address2' =>  $address2,
            'city' =>  $city,
            'state' =>  $state,
           
            'pincode' =>  $pincode,
            'total_price' =>  $total_price,
            'sponser_id' =>  $sponser_id,
            
             'gstamt' =>  $gstamt,
            'gstpercentage' =>  $gstpercentage,
            'totalwithgst' =>  $totalwithgst,
            'area' => $area,
        ]);


      
                    
    }
    // find city state wise
    public function getcitystatewise($stateid)
    {
        
         try {
          
            $city_statewise = DB::table('tbl_city')->where('stateid',$stateid)->get();
            $json['api_status'] = "OK";
            $json['data'] = $city_statewise;
            $json['msg'] = "";
        } catch (\Exception $e) {
            DB::rollback();
            
            $json['api_status'] = "ERROR";
            $json['msg'] = "Error-" . $e->getLine() . " :- " . $e->getMessage();
            
        }
        header('Content-type: application/json');
        echo json_encode($json);

    }

    public function checksponserid(Request $request)
    {

        $cartItem =Cart::where('user_id',Auth::id())->where('cate_id',9)->first();

        if($cartItem)
        {

            $validator = Validator::make($request->all(), [
                'sponser_id' => 'required|exists:users,member_id',
                 
            ]);
            $isExistsamesponser = User::where('id',Auth::id())->first();
            if($isExistsamesponser->member_id == $request->sponser_id)
            {
                return response()->json(array("isExistsamesponser" => false));
            }else{

               
        
             
                $isExists = User::where('member_id',$request->sponser_id)->first();
          
                if ($validator->fails()) {
                    return response()->json([
                                'error' => $validator->errors()->all()
                            ]);
                }elseif($isExists->level_status == 1){
                    return response()->json(array("exists" => true));
                }else{
                    return response()->json(array("exists" => false));
                   
                }
                
            }
           
        }
      

       
         
       
        
  
        // return response()->json(['success' => 'Post created successfully.']);
    }
}
