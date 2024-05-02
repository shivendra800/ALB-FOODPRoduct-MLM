<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Exports\ExportExcelData;
use App\Models\AdminTransectionHistory;
use App\Models\Delivery;
use App\Models\MLMIncome;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use  Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\DeliverdOrderbyDevBoy;
use App\Models\DeliveryPincode;


class OrderController extends Controller
{
    // Pendig orders------------------------------
    // listing
    public function pending_orders()
    {
        $orders = Order::where('status', 'Pending')->get();
        return view('admin.orders.pending_orders', compact('orders'));
    }
    // searching
    public function pending_orders_search(Request $request)
    {


        $orders = Order::when($request->payment_status != null, function ($q) use ($request) {
            return $q->where('payment_status', $request->payment_status);
        })
            ->when($request->start_date != null && $request->end_date != null, function ($q) use ($request) {
                $q->whereBetween(DB::raw('DATE(created_at)'), [$request->start_date, $request->end_date]);
            })
            ->where('status', 'Pending')
            ->paginate(10);
        return view('admin.orders.pending_orders', compact('orders'));
    }
    private $memory_size = "1024M";
    // excel-report
    public function pending_order_report_excel($start_date, $end_date, $payment_status)
    {
        ini_set('memory_limit', $this->memory_size);
        $orders = Order::where('payment_status', $payment_status)->whereBetween(DB::raw('DATE(created_at)'), [$start_date, $end_date])
            ->where('status', 'Pending')->get();

        $head = array([

            "Tracking No",
            "Order Date",
            "Total Price",
            "Payment Mode",
            "Payment Status",


        ]);
        foreach ($orders as $value) {

            $array = array([

                $value->tracking_no,
                $value->created_at,
                $value->total_price,
                $value->payment_mode,
                $value->payment_status,


            ]);
            array_push($head, $array);
        }
        $export = new ExportExcelData($head);
        return Excel::download($export, 'Pending-Excel-Report.xlsx');
    }
    // dispatch order-----------------------------------------------
    // listing
    public function dispatched_orders()
    {
        $orders = Order::where('status', 'Dispatched')->get();
        return view('admin.orders.dispatched_orders', compact('orders'));
    }
    // searching
    public function dispatched_orders_search(Request $request)
    {
        $orders = Order::when($request->payment_status != null, function ($q) use ($request) {
            return $q->where('payment_status', $request->payment_status);
        })
            ->when($request->start_date != null && $request->end_date != null, function ($q) use ($request) {
                $q->whereBetween(DB::raw('DATE(created_at)'), [$request->start_date, $request->end_date]);
            })
            ->where('status', 'Dispatched')
            ->paginate(10);
        return view('admin.orders.dispatched_orders', compact('orders'));
    }
    // excel-report
    public function dispatched_orders_report_excel($start_date, $end_date, $payment_status)
    {
        ini_set('memory_limit', $this->memory_size);
        $orders = Order::where('payment_status', $payment_status)->whereBetween(DB::raw('DATE(created_at)'), [$start_date, $end_date])
            ->where('status', 'Dispatched')->get();

        $head = array([

            "Tracking No",
            "Order Date",
            "Total Price",
            "Payment Mode",
            "Payment Status",


        ]);
        foreach ($orders as $value) {

            $array = array([

                $value->tracking_no,
                $value->created_at,
                $value->total_price,
                $value->payment_mode,
                $value->payment_status,


            ]);
            array_push($head, $array);
        }
        $export = new ExportExcelData($head);
        return Excel::download($export, 'Dispatched-Excel-Report.xlsx');
    }
    // Shipped orders--------------------------------------------------
    // listing
    public function shipped_orders()
    {
        if (Auth::user()->role_as == '2') {
            $orders = Order::where('status', 'Shipped')->where('deliveryboyID', Auth::user()->delivery_boy_id)->get();
        } else {
            $orders = Order::where('status', 'Shipped')->get();
        }

        return view('admin.orders.shipped_orders', compact('orders'));
    }
    // searching
    public function shipped_orders_search(Request $request)
    {
        $orders = Order::when($request->payment_status != null, function ($q) use ($request) {
            return $q->where('payment_status', $request->payment_status);
        })
            ->when($request->start_date != null && $request->end_date != null, function ($q) use ($request) {
                $q->whereBetween(DB::raw('DATE(created_at)'), [$request->start_date, $request->end_date]);
            })
            ->where('status', 'Shipped')
            ->paginate(10);
        return view('admin.orders.shipped_orders', compact('orders'));
    }
    // excel-report
    public function shipped_orders_report_excel($start_date, $end_date, $payment_status)
    {
        ini_set('memory_limit', $this->memory_size);
        $orders = Order::where('payment_status', $payment_status)->whereBetween(DB::raw('DATE(created_at)'), [$start_date, $end_date])
            ->where('status', 'Shipped')->get();

        $head = array([

            "Tracking No",
            "Order Date",
            "Total Price",
            "Payment Mode",
            "Payment Status",


        ]);
        foreach ($orders as $value) {

            $array = array([

                $value->tracking_no,
                $value->created_at,
                $value->total_price,
                $value->payment_mode,
                $value->payment_status,


            ]);
            array_push($head, $array);
        }
        $export = new ExportExcelData($head);
        return Excel::download($export, 'Shipped-Excel-Report.xlsx');
    }
    // Out For Delivery------------------------------------------------
    // listing
    public function out_for_delivery_orders()
    {
        if (Auth::user()->role_as == '2') {
            $orders = Order::where('status', 'Out For Delivery')->where('deliveryboyID', Auth::user()->delivery_boy_id)->get();
        } else {
            $orders = Order::where('status', 'Out For Delivery')->get();
        }

        return view('admin.orders.out_for_delivery_orders', compact('orders'));
    }
    // searching
    public function out_for_delivery_orderss_search(Request $request)
    {
        $orders = Order::when($request->payment_status != null, function ($q) use ($request) {
            return $q->where('payment_status', $request->payment_status);
        })
            ->when($request->start_date != null && $request->end_date != null, function ($q) use ($request) {
                $q->whereBetween(DB::raw('DATE(created_at)'), [$request->start_date, $request->end_date]);
            })
            ->where('status', 'Out For Delivery')
            ->paginate(10);
        return view('admin.orders.out_for_delivery_orders', compact('orders'));
    }
    // excel-report
    public function out_for_delivery_report_excel($start_date, $end_date, $payment_status)
    {
        ini_set('memory_limit', $this->memory_size);
        $orders = Order::where('payment_status', $payment_status)->whereBetween(DB::raw('DATE(created_at)'), [$start_date, $end_date])
            ->where('status', 'Out For Delivery')->get();

        $head = array([

            "Tracking No",
            "Order Date",
            "Total Price",
            "Payment Mode",
            "Payment Status",


        ]);
        foreach ($orders as $value) {

            $array = array([

                $value->tracking_no,
                $value->created_at,
                $value->total_price,
                $value->payment_mode,
                $value->payment_status,


            ]);
            array_push($head, $array);
        }
        $export = new ExportExcelData($head);
        return Excel::download($export, 'Out-For-Delivery-Excel-Report.xlsx');
    }
    // Delivered orders-----------------------------
    // listing
    public function delivered_orders()
    {
        if (Auth::user()->role_as == '2') {
            $orders = Order::where('status', 'Delivered')->where('updated_by', Auth::user()->delivery_boy_id)->latest()->paginate(10);
        } else {
            $orders = Order::where('status', 'Delivered')->latest()->paginate(10);
        }

        return view('admin.orders.delivered_orders', compact('orders'));
    }
    // searching
    public function delivered_orders_search(Request $request)
    {
        $orders = Order::when($request->payment_status != null, function ($q) use ($request) {
            return $q->where('payment_status', $request->payment_status);
        })
            ->when($request->start_date != null && $request->end_date != null, function ($q) use ($request) {
                $q->whereBetween(DB::raw('DATE(created_at)'), [$request->start_date, $request->end_date]);
            })
            ->where('status', 'Delivered')
            ->paginate(10);
        return view('admin.orders.delivered_orders', compact('orders'));
    }
    // excel-report
    public function delivered_orders_report_excel($start_date, $end_date, $payment_status)
    {
        ini_set('memory_limit', $this->memory_size);
        $orders = Order::whereBetween(DB::raw('DATE(created_at)'), [$start_date, $end_date])
            ->where('status', 'Delivered')->get();

        $head = array([

            "Tracking No",
            "Order Date",
            "Total Price",
            "Payment Mode",
            "Payment Status",


        ]);
        foreach ($orders as $value) {

            $array = array([

                $value->tracking_no,
                $value->created_at,
                $value->total_price,
                $value->payment_mode,
                $value->payment_status,


            ]);
            array_push($head, $array);
        }
        $export = new ExportExcelData($head);
        return Excel::download($export, 'Delivered-Excel-Report.xlsx');
    }
    // View Orders Detailsa and take action----------------------------
    public function view_order($id)
    {

        $orders = Order::where('orders.id', $id)->select('orders.*', 'tbl_city.cityName', 'tbl_state.stateName')
            ->join('tbl_city', 'tbl_city.id', '=', 'orders.city')->join('tbl_state', 'tbl_state.id', '=', 'orders.state')->first();
        $deliveryboylist = Delivery::get();
        return view('admin.orders.view_orders', compact('orders', 'deliveryboylist'));
    }
    // Order Action Update ----------------------------------------
    public function updateorder(Request $request, $id)
    {
        // pending order for status 0

        // DB::beginTransaction();

        $orders = Order::find($id);
        
        
             

          $orderupdated = Order::where('id',$id)->first();
          $orderupdated->product_updated_by = Auth::user()->name;
          $orderupdated->updated_by = Auth::user()->delivery_boy_id;
          $orderupdated->update();
        
        
        
        
        
        
        
         $getuserforsendemail = User::where('id', $orders->user_id)->first();

        // return $id;
             
          $getorderitemforemail = OrderItem::where('order_id', $id)->get()->toArray();
          $orderDetails = Order::with('orders_products')->where('id',$id)->first()->toArray();
                 $Details = Order::with('orders_products')->where('id',$id)->first()->toArray();
                // dd($Details);
                
                // strt core
                $name= $orders['fname '];
                 $email= $orders['email'];
                    $item_tracking_number       = $orders->tracking_no;
                     $total= $orders['totalwithgst'];
                    $statusorder = $request->input('order_status');
                    $subject = "Order Status Updated- ALB Food Prdouct";

              $from = "info@albfoodproducts.in";
            
            $message = "
            
               
                    <tr><td>&nbsp;</td></tr><br></br>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>Hello $name</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>Your Order # $item_tracking_number   status Has Been Updated to $statusorder Successfully</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    
                    <td>INR  $total </td>
 
                     
                     
                              
                 
                           
                           
                               
                           
                         
            ";
            
            $headers = "From: $from \r\n";
            
            $headers .= "Content-type: text/html\r\n";
            
            
            mail($email,$subject,$message,$headers);
            
            /// end core 
            
          $email = $getuserforsendemail['email'];
          $messageData =[
              'email' =>$email,
              'name' =>$getuserforsendemail['name'],
              'order_id' => $id,
            //   'order_details' =>  $Details,
              'order_status' => $request->input('order_status'),
              
              'item_tracking_number' => $orders['tracking_no'],
              'total_price' =>$orderDetails['total_price'],
          ];
          Mail::send('mail.order_status',$messageData,function($message)use($email){
              $message->to($email)->subject('Order Status Updated- ALB Food Prdouct');
          });

      



        if (Auth::user()->role_as == '1') 
        {
           
            $orders->status = $request->input('order_status');
            if ($request->input('order_status') == 'Delivered' ) {
                $orders->payment_status = $request->input('payment_status');

                $orders->deliveryboyID = Auth::user()->delivery_boy_id;


                 // update level status to users table
                 $getuser = User::where('id', $orders->user_id)->first();
                 $getuser->level_status = 1;
                 $getuser->order_combo_product_date = Carbon::now()->addDays(30)->format('Y-m-d');
                 $getuser->update();
                 //leve income distribution when product in delivered and code start here
                       $getorderitem = OrderItem::where('order_id', $orders['id'])->first();
                       $getprod= Product::where('id', $getorderitem->prod_id)->first();
                       if($getprod['cate_id']==9){

                           // return "9";

                           ////////////////////////////////////////////////////////////////////////////////////////////////////////
                              
                               $statuschange = User::where('id', $orders->user_id)->first();
                               $freshid = $statuschange->member_id;  
                               $authmemberid = "ALB-202023-1";
                               $companyid  =  "ALB-202023-1";  
                               $admininuser = User::where('member_id', $freshid)->first();
                               $memberid = $admininuser->member_id;  
                               $custname = $admininuser->name;  
                               $custnewid = $admininuser->member_id;  
                               $timeofgeneration = $admininuser->order_combo_product_date;  
                               $getorderitem = OrderItem::where('order_id', $orders['id'])->first();
                               $issueHealth = Product::where('id', $getorderitem->prod_id)->where('cate_id', '9')->first();
                              $package = $issueHealth->selling_price;  
                              $getactivesponsorid = User::where('member_id', $statuschange->sponser_id)->first();
                              $sponsor_id = $statuschange->sponser_id;
                           //    if auth ki member id and sponsor id same h to is condition me ni jayega qki yha se hme lastinserted id ni mil payegi
                           
                               if ($sponsor_id != $authmemberid)
                               {
                                   if ($freshid != $companyid) {

                                      $aa = 1;
                                       while ($memberid != $companyid) {


                                           if ($aa == 1) {

                                               $amount = (16 * $package) / 100;
                                               $remainng_amount = $package - $amount;
                                               $percentage = 16;
                                           }

                                           if ($aa == 2) {
                                               $amount1 = (16 * $package) / 100;
                                               $remainng_amount1 = $package - $amount1;

                                               $amount = (8 * $remainng_amount1) / 100;
                                               $remainng_amount = $remainng_amount1 - $amount;
                                               $percentage = 8;
                                           } elseif ($aa == 3) {
                                               $amount1 = (16 * $package) / 100;
                                               $remainng_amount1 = $package - $amount1;

                                               $amount2 = (8 * $remainng_amount1) / 100;
                                               $remainng_amount2 = $remainng_amount1 - $amount2;

                                               $amount = (5 * $remainng_amount2) / 100;
                                               $remainng_amount = $remainng_amount2 - $amount;
                                               $percentage = 5;
                                           } elseif ($aa == 4) {
                                               $amount1 = (16 * $package) / 100;
                                               $remainng_amount1 = $package - $amount1;

                                               $amount2 = (8 * $remainng_amount1) / 100;
                                               $remainng_amount2 = $remainng_amount1 - $amount2;

                                               $amount3 = (5 * $remainng_amount2) / 100;
                                               $remainng_amount3 = $remainng_amount2 - $amount3;

                                               $amount = (4 * $remainng_amount3) / 100;
                                               $remainng_amount = $remainng_amount3 - $amount;
                                               $percentage = 4;
                                           } elseif ($aa == 5) {
                                               $amount1 = (16 * $package) / 100;
                                               $remainng_amount1 = $package - $amount1;

                                               $amount2 = (8 * $remainng_amount1) / 100;
                                               $remainng_amount2 = $remainng_amount1 - $amount2;

                                               $amount3 = (5 * $remainng_amount2) / 100;
                                               $remainng_amount3 = $remainng_amount2 - $amount3;

                                               $amount4 = (4 * $remainng_amount3) / 100;
                                               $remainng_amount4 = $remainng_amount3 - $amount4;

                                               $amount = (2 * $remainng_amount4) / 100;
                                               $remainng_amount = $remainng_amount4 - $amount;
                                               $percentage = 2;
                                           } 


                                           $issueHealthtbl = User::where('member_id', $memberid)->first();
                                           $introducerid = $issueHealthtbl->sponser_id;

                                               $healthcardtbl = User::where('member_id', '=', $introducerid)->first();

                                           $introid = $healthcardtbl->id;

                                           $introducerid = $healthcardtbl->member_id;
                                           $introname = $healthcardtbl->name;
                                           $introstatus = $healthcardtbl->level_status;
                                           
                                           if ($introstatus == 1 && $amount > 0) {


                                               $user['introid'] = $introid;
                                               $user['intronewid'] =  $introducerid;
                                               $user['introname'] = $introname;
                                               $user['rs'] = $amount;
                                               $user['date'] = date('d');
                                               $user['month'] =  date('m');
                                               $user['year'] =  date('Y');
                                               $user['status'] = 1;
                                               $user['point'] = 5;
                                               $user['package'] = $package;
                                               $user['remainng_amount'] = $remainng_amount;
                                               $user['nextsunday'] = $timeofgeneration;
                                               $user['members'] = $memberid;
                                               $user['position'] = $aa;
                                               $user['custid'] = 0;
                                               $user['custnewid'] = $custnewid;
                                               $user['custname'] =  $custname;
                                               $user['paidstatus'] = 1;
                                               $user['lastpaiddate'] = $timeofgeneration;
                                               $user['percentage'] = $percentage;
                                               $lastinsertedID = DB::table('income2')->insertGetId($user);
                                           $lastremainingamount = DB::table('income2')->select('remainng_amount')->where('id',$lastinsertedID)->first(); 



                                               //    income level insert in total_withdraw_transection
                                               $check_inserted_id = DB::table('total_amount_withdraws')->where('user_id',$introid)->first();
                                               if($check_inserted_id !=null){
                                                   $total_healthcard_amount = $check_inserted_id->wallet_total_amount + $amount;
                                                   $total_amount = $check_inserted_id->total+$amount;
                                                   $inser_total_amount_withdraws = array(
                                                       'total' =>$total_amount,
                                                       'wallet_total_amount' => $total_healthcard_amount,
                                                       'updated_at' => date('Y-m-d H:i:s'),
                                                       
                                                   );
                                               DB::table('total_amount_withdraws')->where('user_id',$introid)->update($inser_total_amount_withdraws);
                                               }else{
                                                       $inser_total_amount_withdraws = array(
                                                           'user_id' =>   $introid,
                                                           'wallet_total_amount' => $amount,
                                                           'withdrwa_amount' => 0,
                                                           'total_withdrwa_amount' => 0,
                                                           'remark' => "Amount Cre",
                                                           'total' => $amount,
                                                           'created_at' => date('Y-m-d H:i:s'),
                                                       );
                       
                                               DB::table('total_amount_withdraws')->insert($inser_total_amount_withdraws);
                                           }
                                           // end income level insert in total_withdraw_transection
                                           }

                                           
                                           

                                           $memberid = $introducerid;
                                           $aa = $aa + 1;
                                           if ($aa > 5) {
                                               $memberid = $companyid;
                                           }
                                       }
                                   }

                                 /////////////  Rest Remaing amount of level income 
                                 $gethistroy = new AdminTransectionHistory();
                                 $gethistroy->user_id =1;
                                 $gethistroy->trasncetion_amt =$lastremainingamount->remainng_amount;
                                 $gethistroy->trasncetion_per =65;
                                 $gethistroy->product_amt =$package;
                                 $gethistroy->used_admin_sponserid = $freshid;
                                 $gethistroy->save();
 
                                       //    income level insert in total_withdraw_transection
                                        $check_inserted_id = DB::table('total_amount_withdraws')->where('user_id','1')->first();
                                       if($check_inserted_id !=null){
                                               $restlevelamt= $check_inserted_id->level_rest_amt;
                                               $total_rest_amt_amount = $restlevelamt + $lastremainingamount->remainng_amount;
                                           $total_amount = $check_inserted_id->total+$lastremainingamount->remainng_amount;
                                           $inser_total_amount_withdraws = array(
                                               'total' =>$total_amount,
                                               'level_rest_amt' => $total_rest_amt_amount,
                                               'updated_at' => date('Y-m-d H:i:s'),
                                               
                                           );
                                       DB::table('total_amount_withdraws')->where('user_id','1')->update($inser_total_amount_withdraws);
                                       }else{
                                               $inser_total_amount_withdraws = array(
                                                   'user_id' =>   '1',
                                                   'level_rest_amt' => $lastremainingamount->remainng_amount,
                                                   'withdrwa_amount' => 0,
                                                   'total_withdrwa_amount' => 0,
                                                   'remark' => "Amount Cre",
                                                   'total' => $lastremainingamount->remainng_amount,
                                                   'created_at' => date('Y-m-d H:i:s'),
                                               );
               
                                       DB::table('total_amount_withdraws')->insert($inser_total_amount_withdraws);
                                   }
                                   // end income level insert in total_withdraw_transection

                                 ////  end rest amount of level income
                                 
                                               
                                       
                               } 
                               else {

                                    
                                $gethistroy = new AdminTransectionHistory();
                                $gethistroy->user_id =1;
                                $gethistroy->trasncetion_amt =$package;
                                $gethistroy->trasncetion_per =100;
                                $gethistroy->product_amt =$package;
                                $gethistroy->used_admin_sponserid = $freshid;
                                $gethistroy->save();

                                      //    income level insert in total_withdraw_transection
                                      $check_inserted_id = DB::table('total_amount_withdraws')->where('user_id','1')->first();
                                      if($check_inserted_id !=null){
                                       $restamt= $check_inserted_id->rest_amt;
                                              $total_rest_amt_amount = $restamt + $package;
                                          $total_amount = $check_inserted_id->total+$package;
                                          $inser_total_amount_withdraws = array(
                                              'total' =>$total_amount,
                                              'rest_amt' => $total_rest_amt_amount,
                                              'updated_at' => date('Y-m-d H:i:s'),
                                              
                                          );
                                      DB::table('total_amount_withdraws')->where('user_id','1')->update($inser_total_amount_withdraws);
                                      }else{
                                              $inser_total_amount_withdraws = array(
                                                  'user_id' =>   '1',
                                                  'rest_amt' => $package,
                                                  'withdrwa_amount' => 0,
                                                  'total_withdrwa_amount' => 0,
                                                  'remark' => "Amount Cre",
                                                  'total' => $package,
                                                  'created_at' => date('Y-m-d H:i:s'),
                                              );
              
                                      DB::table('total_amount_withdraws')->insert($inser_total_amount_withdraws);
                                  }
                                  // end income level insert in total_withdraw_transection





                                   $orders->deliveryboyID = $request->input('deliveryboyID');
                                   $orders->update();
                                   return redirect()->back()->with('status', "Order Updated Successfully");
                               }
                       }

                       
                       else{

                           // return "not 9";

                           $orders->deliveryboyID = $request->input('deliveryboyID');
                           $orders->update();
                           return redirect()->back()->with('status', "Order Updated Successfully");
                       }


                       //////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                       

               //level income code end here

            }
            $orders->deliveryboyID = $request->input('deliveryboyID');
           
        } else {

          
            $orders->status = $request->input('order_status');
            
            if ($request->input('order_status') == 'Delivered' ) {
                $orders->payment_status = $request->input('payment_status');
                
                
                 if($orders['payment_mode']=="COD")
                {
                    $orders->deliveryboyID = Auth::user()->delivery_boy_id;
                    $orders->payment_status = $request->input('payment_status');

                    $agetuser = Delivery::where('id',Auth::user()->delivery_boy_id)->first();
               
                     $agetuser->total_cash = $agetuser['total_cash'] + $orders['totalwithgst'];
                    $agetuser->save();

                }
                else{
                     $orders->deliveryboyID = Auth::user()->delivery_boy_id;
                    $orders->payment_status = "Paid";
                }
                
                
                
                $getdliveryhistroy = new DeliverdOrderbyDevBoy;
                $getdliveryhistroy->order_id = $id ;
                $getdliveryhistroy->user_id =  $orders['user_id'];
                $getdliveryhistroy->delivery_boy_id = Auth::user()->delivery_boy_id;
                $getdliveryhistroy->amount_received = $orders['totalwithgst'];
                $getdliveryhistroy->payment_mode = $orders['payment_mode'];
                if($orders['payment_mode']=="COD")
                {
                    $getdliveryhistroy->payment_status = $request->input('payment_status');
                }
                else{
                    $getdliveryhistroy->payment_status = "Paid";
                }
                $getdliveryhistroy->save();

                $orders->deliveryboyID = Auth::user()->delivery_boy_id;


                 // update level status to users table
                 $getuser = User::where('id', $orders->user_id)->first();
                 $getuser->level_status = 1;
                 $getuser->order_combo_product_date =Carbon::now()->addDays(30)->format('Y-m-d');
                 $getuser->update();
                 //leve income distribution when product in delivered and code start here
                       $getorderitem = OrderItem::where('order_id', $orders['id'])->first();
                       $getprod= Product::where('id', $getorderitem->prod_id)->first();
                       if($getprod['cate_id']==9){

                           // return "9";

                           ////////////////////////////////////////////////////////////////////////////////////////////////////////
                              
                               $statuschange = User::where('id', $orders->user_id)->first();
                               $freshid = $statuschange->member_id;  
                               $authmemberid = "ALB-202023-1";
                               $companyid  =  "ALB-202023-1";  
                               $admininuser = User::where('member_id', $freshid)->first();
                               $memberid = $admininuser->member_id;  
                               $custname = $admininuser->name;  
                               $custnewid = $admininuser->member_id;  
                               $timeofgeneration = $admininuser->order_combo_product_date;  
                               $getorderitem = OrderItem::where('order_id', $orders['id'])->first();
                               $issueHealth = Product::where('id', $getorderitem->prod_id)->where('cate_id', '9')->first();
                              $package = $issueHealth->selling_price;  
                              $getactivesponsorid = User::where('member_id', $statuschange->sponser_id)->first();
                              $sponsor_id = $statuschange->sponser_id;
                           //    if auth ki member id and sponsor id same h to is condition me ni jayega qki yha se hme lastinserted id ni mil payegi
                           
                               if ($sponsor_id != $authmemberid)
                               {
                                   if ($freshid != $companyid) {

                                      $aa = 1;
                                       while ($memberid != $companyid) {


                                           if ($aa == 1) {

                                               $amount = (16 * $package) / 100;
                                               $remainng_amount = $package - $amount;
                                               $percentage = 16;
                                           }

                                           if ($aa == 2) {
                                               $amount1 = (16 * $package) / 100;
                                               $remainng_amount1 = $package - $amount1;

                                               $amount = (8 * $remainng_amount1) / 100;
                                               $remainng_amount = $remainng_amount1 - $amount;
                                               $percentage = 8;
                                           } elseif ($aa == 3) {
                                               $amount1 = (16 * $package) / 100;
                                               $remainng_amount1 = $package - $amount1;

                                               $amount2 = (8 * $remainng_amount1) / 100;
                                               $remainng_amount2 = $remainng_amount1 - $amount2;

                                               $amount = (5 * $remainng_amount2) / 100;
                                               $remainng_amount = $remainng_amount2 - $amount;
                                               $percentage = 5;
                                           } elseif ($aa == 4) {
                                               $amount1 = (16 * $package) / 100;
                                               $remainng_amount1 = $package - $amount1;

                                               $amount2 = (8 * $remainng_amount1) / 100;
                                               $remainng_amount2 = $remainng_amount1 - $amount2;

                                               $amount3 = (5 * $remainng_amount2) / 100;
                                               $remainng_amount3 = $remainng_amount2 - $amount3;

                                               $amount = (4 * $remainng_amount3) / 100;
                                               $remainng_amount = $remainng_amount3 - $amount;
                                               $percentage = 4;
                                           } elseif ($aa == 5) {
                                               $amount1 = (16 * $package) / 100;
                                               $remainng_amount1 = $package - $amount1;

                                               $amount2 = (8 * $remainng_amount1) / 100;
                                               $remainng_amount2 = $remainng_amount1 - $amount2;

                                               $amount3 = (5 * $remainng_amount2) / 100;
                                               $remainng_amount3 = $remainng_amount2 - $amount3;

                                               $amount4 = (4 * $remainng_amount3) / 100;
                                               $remainng_amount4 = $remainng_amount3 - $amount4;

                                               $amount = (2 * $remainng_amount4) / 100;
                                               $remainng_amount = $remainng_amount4 - $amount;
                                               $percentage = 2;
                                           } 


                                           $issueHealthtbl = User::where('member_id', $memberid)->first();
                                           $introducerid = $issueHealthtbl->sponser_id;

                                               $healthcardtbl = User::where('member_id', '=', $introducerid)->first();

                                           $introid = $healthcardtbl->id;

                                           $introducerid = $healthcardtbl->member_id;
                                           $introname = $healthcardtbl->name;
                                           $introstatus = $healthcardtbl->level_status;
                                           
                                           if ($introstatus == 1 && $amount > 0) {


                                               $user['introid'] = $introid;
                                               $user['intronewid'] =  $introducerid;
                                               $user['introname'] = $introname;
                                               $user['rs'] = $amount;
                                               $user['date'] = date('d');
                                               $user['month'] =  date('m');
                                               $user['year'] =  date('Y');
                                               $user['status'] = 1;
                                               $user['point'] = 5;
                                               $user['package'] = $package;
                                               $user['remainng_amount'] = $remainng_amount;
                                               $user['nextsunday'] = $timeofgeneration;
                                               $user['members'] = $memberid;
                                               $user['position'] = $aa;
                                               $user['custid'] = 0;
                                               $user['custnewid'] = $custnewid;
                                               $user['custname'] =  $custname;
                                               $user['paidstatus'] = 1;
                                               $user['lastpaiddate'] = $timeofgeneration;
                                               $user['percentage'] = $percentage;
                                               $lastinsertedID = DB::table('income2')->insertGetId($user);
                                           $lastremainingamount = DB::table('income2')->select('remainng_amount')->where('id',$lastinsertedID)->first(); 



                                               //    income level insert in total_withdraw_transection
                                               $check_inserted_id = DB::table('total_amount_withdraws')->where('user_id',$introid)->first();
                                               if($check_inserted_id !=null){
                                                   $total_healthcard_amount = $check_inserted_id->wallet_total_amount + $amount;
                                                   $total_amount = $check_inserted_id->total+$amount;
                                                   $inser_total_amount_withdraws = array(
                                                       'total' =>$total_amount,
                                                       'wallet_total_amount' => $total_healthcard_amount,
                                                       'updated_at' => date('Y-m-d H:i:s'),
                                                       
                                                   );
                                               DB::table('total_amount_withdraws')->where('user_id',$introid)->update($inser_total_amount_withdraws);
                                               }else{
                                                       $inser_total_amount_withdraws = array(
                                                           'user_id' =>   $introid,
                                                           'wallet_total_amount' => $amount,
                                                           'withdrwa_amount' => 0,
                                                           'total_withdrwa_amount' => 0,
                                                           'remark' => "Amount Cre",
                                                           'total' => $amount,
                                                           'created_at' => date('Y-m-d H:i:s'),
                                                       );
                       
                                               DB::table('total_amount_withdraws')->insert($inser_total_amount_withdraws);
                                           }
                                           // end income level insert in total_withdraw_transection
                                           }

                                           
                                           

                                           $memberid = $introducerid;
                                           $aa = $aa + 1;
                                           if ($aa > 5) {
                                               $memberid = $companyid;
                                           }
                                       }
                                   }

                                 /////////////  Rest Remaing amount of level income 
                                 $gethistroy = new AdminTransectionHistory();
                                 $gethistroy->user_id =1;
                                 $gethistroy->trasncetion_amt =$lastremainingamount->remainng_amount;
                                 $gethistroy->trasncetion_per =65;
                                 $gethistroy->product_amt =$package;
                                 $gethistroy->used_admin_sponserid = $freshid;
                                 $gethistroy->save();
 
                                       //    income level insert in total_withdraw_transection
                                        $check_inserted_id = DB::table('total_amount_withdraws')->where('user_id','1')->first();
                                       if($check_inserted_id !=null){
                                               $restlevelamt= $check_inserted_id->level_rest_amt;
                                               $total_rest_amt_amount = $restlevelamt + $lastremainingamount->remainng_amount;
                                           $total_amount = $check_inserted_id->total+$lastremainingamount->remainng_amount;
                                           $inser_total_amount_withdraws = array(
                                               'total' =>$total_amount,
                                               'level_rest_amt' => $total_rest_amt_amount,
                                               'updated_at' => date('Y-m-d H:i:s'),
                                               
                                           );
                                       DB::table('total_amount_withdraws')->where('user_id','1')->update($inser_total_amount_withdraws);
                                       }else{
                                               $inser_total_amount_withdraws = array(
                                                   'user_id' =>   '1',
                                                   'level_rest_amt' => $lastremainingamount->remainng_amount,
                                                   'withdrwa_amount' => 0,
                                                   'total_withdrwa_amount' => 0,
                                                   'remark' => "Amount Cre",
                                                   'total' => $lastremainingamount->remainng_amount,
                                                   'created_at' => date('Y-m-d H:i:s'),
                                               );
               
                                       DB::table('total_amount_withdraws')->insert($inser_total_amount_withdraws);
                                   }
                                   // end income level insert in total_withdraw_transection

                                 ////  end rest amount of level income
                                 
                                               
                                       
                               } 
                               else {

                                    
                                $gethistroy = new AdminTransectionHistory();
                                $gethistroy->user_id =1;
                                $gethistroy->trasncetion_amt =$package;
                                $gethistroy->trasncetion_per =100;
                                $gethistroy->product_amt =$package;
                                $gethistroy->used_admin_sponserid = $freshid;
                                $gethistroy->save();

                                      //    income level insert in total_withdraw_transection
                                      $check_inserted_id = DB::table('total_amount_withdraws')->where('user_id','1')->first();
                                      if($check_inserted_id !=null){
                                       $restamt= $check_inserted_id->rest_amt;
                                              $total_rest_amt_amount = $restamt + $package;
                                          $total_amount = $check_inserted_id->total+$package;
                                          $inser_total_amount_withdraws = array(
                                              'total' =>$total_amount,
                                              'rest_amt' => $total_rest_amt_amount,
                                              'updated_at' => date('Y-m-d H:i:s'),
                                              
                                          );
                                      DB::table('total_amount_withdraws')->where('user_id','1')->update($inser_total_amount_withdraws);
                                      }else{
                                              $inser_total_amount_withdraws = array(
                                                  'user_id' =>   '1',
                                                  'rest_amt' => $package,
                                                  'withdrwa_amount' => 0,
                                                  'total_withdrwa_amount' => 0,
                                                  'remark' => "Amount Cre",
                                                  'total' => $package,
                                                  'created_at' => date('Y-m-d H:i:s'),
                                              );
              
                                      DB::table('total_amount_withdraws')->insert($inser_total_amount_withdraws);
                                  }
                                  // end income level insert in total_withdraw_transection





                                   $orders->deliveryboyID = $request->input('deliveryboyID');
                                   $orders->update();
                                   return redirect()->back()->with('status', "Order Updated Successfully");
                               }
                       }

                       
                       else{

                           // return "not 9";

                        //   $orders->deliveryboyID = $request->input('deliveryboyID');
                                 if($orders['payment_mode']=="COD")
                {
                    $orders->deliveryboyID = Auth::user()->delivery_boy_id;
                    $orders->payment_status = $request->input('payment_status');

                }
                else{
                     $orders->deliveryboyID = Auth::user()->delivery_boy_id;
                    $orders->payment_status = "Paid";
                }
                
                
                
                // $getdliveryhistroy = new DeliverdOrderbyDevBoy;
                // $getdliveryhistroy->order_id = $id ;
                // $getdliveryhistroy->user_id =  $orders['user_id'];
                // $getdliveryhistroy->delivery_boy_id = Auth::user()->delivery_boy_id;
                // $getdliveryhistroy->amount_received = $orders['totalwithgst'];
                // $getdliveryhistroy->payment_mode = $orders['payment_mode'];
                // if($orders['payment_mode']=="COD")
                // {
                //     $getdliveryhistroy->payment_status = $request->input('payment_status');
                // }
                // else{
                //     $getdliveryhistroy->payment_status = "Paid";
                // }
                // $getdliveryhistroy->save();
                           $orders->update();
                           return redirect()->back()->with('status', "Order Updated Successfully");
                       }


                       //////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                       

               //level income code end here

            }
            $orders->deliveryboyID = Auth::user()->delivery_boy_id;
        }

       
        
        $orders->update();
        // DB::commit();
      
        return redirect()->back()->with('status', "Order Updated Successfully");
    }
    // get delivery boy api with pincode wise

   public function get_delivery_boy($pincode)
    {
        try {
           
            
            $deliveryBoyPincodewise = DeliveryPincode::with('deliveryboy')->where('allot_pincode',$pincode)->get();
            $json['api_status'] = "OK";
            $json['data'] = $deliveryBoyPincodewise;
            $json['msg'] = "";
        } catch (\Exception $e) {
            DB::rollback();

            $json['api_status'] = "ERROR";
            $json['msg'] = "Error-" . $e->getLine() . " :- " . $e->getMessage();
        }
        header('Content-type: application/json');
        echo json_encode($json);
    }
    
      public function InvoiceBill($id)
    {
        $userDetails = Order::with('getuser')->join('tbl_state','tbl_state.id','orders.state')->join('tbl_city','tbl_city.id','orders.city')->where('orders.id',$id)->first();
        $orderDetails = OrderItem::with('product')->where('order_id',$id)->get();
        return view('admin.invoice_bill',compact('userDetails','orderDetails'));
    }
















  
}
