<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\DCashCollLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\DeliverdOrderbyDevBoy;
use App\Models\DeliveryPincode;
 
 

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delivery_men = Delivery::all();
        return view('admin.delivery.index',compact('delivery_men'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.delivery.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
             
            'name' => 'required',
            'phone' => 'required|numeric:10',
            'id_proof' => 'required',
            'id_proof_no' => 'required',
            'id_image' => 'required',
            'email' => 'required|unique:users|unique:deliveries',
            'image' => 'required',
            'allot_pinecode' => 'required|numeric:6',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
             
        ]);
       $delivery_men = new Delivery();
       if($request->hasFile('id_image'))
       {
        $file = $request->file('id_image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('admin_asset/uploads/deliveryProof/',$filename);
        $delivery_men->id_image = $filename;

       }
       if($request->hasFile('image'))
       {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('admin_asset/uploads/deliverymen/',$filename);
        $delivery_men->image = $filename;

       }
       $delivery_men->name = $request->input('name');
       $delivery_men->phone = $request->input('phone');
       $delivery_men->id_proof = $request->input('id_proof');
       $delivery_men->id_proof_no = $request->input('id_proof_no');
      
       $delivery_men->email = $request->input('email');
       $delivery_men->allot_pinecode = $request->input('allot_pinecode');
       $delivery_men->state = $request->input('state');
       $delivery_men->district = $request->input('district');
       $delivery_men->division = $request->input('division');
       $delivery_men->region = $request->input('region');
       $delivery_men->block = $request->input('block');
       
      
       $delivery_men->password = $request->input('password');
       $delivery_men->save();
    //    dd($delivery_men);
       $inserted_id=  $delivery_men->id;
       //  insert in user table
       $insert_user_tbl = new User();
       $insert_user_tbl->name = $request->input('name');
       $insert_user_tbl->phone = $request->input('phone');
       $insert_user_tbl->email = $request->input('email');
       $insert_user_tbl->password = Hash::make($request->input('password'));
       $insert_user_tbl->role_as = 2;
       $insert_user_tbl->delivery_boy_id = $inserted_id;
       $insert_user_tbl->save();
       //    dd($category);
        return redirect('/Delivery-Men')->with('status','Delivery-Men Added Succsessfully');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delivery_men= Delivery::find($id);
        return view('admin.delivery.edit',compact('delivery_men'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
             
            'name' => 'required',
            'phone' => 'required|numeric:10',
            'id_proof' => 'required',
            'id_proof_no' => 'required',
            
            'email' => 'required',
            'allot_pinecode' => 'required|numeric:6',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
             
        ]);
        $delivery_men= Delivery::find($id);
        if($request->hasFile('id_image'))
        {
          $path = 'admin_asset/uploads/deliveryProof/'.$delivery_men->id_image;
          if(File::exists($path))
          {
            File::delete($path);
          }
         $file = $request->file('id_image');
         $ext = $file->getClientOriginalExtension();
         $filename = time().'.'.$ext;
         $file->move('admin_asset/uploads/deliverymen/',$filename);
         $delivery_men->id_image = $filename;
 
        }

        if($request->hasFile('image'))
        {
          $path = 'admin_asset/uploads/deliverymen/'.$delivery_men->image;
          if(File::exists($path))
          {
            File::delete($path);
          }
         $file = $request->file('image');
         $ext = $file->getClientOriginalExtension();
         $filename = time().'.'.$ext;
         $file->move('admin_asset/uploads/deliverymen/',$filename);
         $delivery_men->image = $filename;
 
        }
        $delivery_men->name = $request->input('name');
        $delivery_men->phone = $request->input('phone');
        $delivery_men->id_proof = $request->input('id_proof');
        $delivery_men->id_proof_no = $request->input('id_proof_no');
        
        $delivery_men->email = $request->input('email');
        $delivery_men->allot_pinecode = $request->input('allot_pinecode');
        $delivery_men->state = $request->input('state');
        $delivery_men->district = $request->input('district');
        $delivery_men->division = $request->input('division');
        $delivery_men->region = $request->input('region');
        $delivery_men->block = $request->input('block');
        $delivery_men->password = $request->input('password');
        $delivery_men->update();
        // update in user table--
        $insert_user_tbl = User::where('delivery_boy_id',$id)->first();
        $insert_user_tbl->name = $request->input('name');
        $insert_user_tbl->phone = $request->input('phone');
       
        $insert_user_tbl->password = Hash::make($request->input('password'));
        $insert_user_tbl->role_as = 2;
        $insert_user_tbl->update();
        return redirect('/Delivery-Men')->with('status','Delivery-Men Updated Succsessfully');
    }

   
    public function destroy($id)
    {
        $delivery_men= Delivery::find($id);
        if($delivery_men->image)
        {
            $path = 'admin_asset/uploads/deliverymen/'.$delivery_men->image;
            if(File::exists($path))
            {
                File::delete($path);
            } 

        }
        $delivery_men->delete();
        return redirect('/Delivery-Men')->with('status','Delivery-Men Deleted Succsessfully');
    }
    // get location
    public function get_location(Request $request)
    {
        // return "jj";
        
           $pincode = $request->input('pincode');
         return  $data = file_get_contents('https://api.postalpincode.in/pincode/'.$pincode);
        //   echo $data;
           $data = json_decode($data);
            // echo '<pre>';
            // print_r($data['0']->PostOffice['0']);
        if(isset($data['0']->PostOffice['0']))
        {
           
            $arr['State'] =$data['0']->PostOffice['0']->State;
            $arr['District'] =$data['0']->PostOffice['0']->District;
            $arr['Division'] =$data['0']->PostOffice['0']->Division;
            $arr['Region'] =$data['0']->PostOffice['0']->Region;
            $arr['Block'] =$data['0']->PostOffice['0']->Block;
            echo json_encode($arr);
        }else{
            echo 'no';
        }
           
            


        
    }
    
      public function Deliverymenlist()
    {
        $delivery_men = Delivery::all();
        return view('admin.delivery.delivery_menlist',compact('delivery_men'));
    }

    public function Deliveryorderlist($id)
    {
         $deliver_orderbydelmen = DeliverdOrderbyDevBoy::with('orders')->where('delivery_boy_id',$id)->get();
       
        $todayDate = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

         $totalDaysaleOrder = DeliverdOrderbyDevBoy::where('payment_mode','COD')->where('delivery_boy_id',$id)->whereDate('created_at',$todayDate)->whereMonth('created_at',$thisMonth)->whereYear('created_at', $thisYear)->sum('amount_received');
        
          $getamount = Delivery::where('id',$id)->first();

          $gethistroycash = DCashCollLog::where('devilery_id',$id)->first();
        
        return view('admin.delivery.delivery_orderlist',compact('deliver_orderbydelmen','totalDaysaleOrder','getamount','gethistroycash'));
    }

    public function CashCollectionUpdate(Request $request,$id)
    {

       $data=$request->all();
        //  $data['recive_amount'];
        $checkamount = Delivery::where('id',$id)->first();

        $request->validate([
            'recive_amount' => 'required|numeric|gt:0',
        ]);

        if($checkamount['total_cash'] >= $data['recive_amount'])
        {
            // return $request->recive_amoun;
            $dchaslog = new DCashCollLog;
            $dchaslog->devilery_id = $id;
            $dchaslog->recive_amount = $request->recive_amount;
            $dchaslog->total_amount = $request->total_amount;
            $dchaslog->after_recive_total_amt = $request->total_amount- $request->recive_amount;
            $dchaslog->save();
    
    
            $getamount = Delivery::where('id',$id)->first();
            $getamount->total_cash = $request->total_amount - $request->recive_amount;;
            $getamount->save();

            return redirect()->back()->with('status','Cash Recive Successfully!');

        }else{
            return redirect()->back()->with('status','Enter Amount is Not Vaild!');

        }


    }

    public function CashCollectionHistroy($id)
    {
         $getamount = DCashCollLog::where('devilery_id',$id)->get();

        return view('admin.delivery.cash_collection_histroy',compact('getamount'));
    }
    
    
     public function AssignPincode(Request $request , $id)
    {
     
        if($request->isMethod('post'))
        {
           
            $assigndeliverypin = new DeliveryPincode();
            $assigndeliverypin->delivery_boy_id = $id;
            $assigndeliverypin->allot_pincode = $request->allot_pincode;
            $assigndeliverypin->save();
            
            return redirect()->back()->with('status','Pincode Added Successfully!');

        }
      
        $deliveryboy = Delivery::find($id);
        $deliveryBoyPincodewise = DeliveryPincode::with('deliveryboy')->where('delivery_boy_id',$id)->get();

        return view('admin.delivery.assign_pincode',compact('deliveryboy','deliveryBoyPincodewise'));
    }

    public function AssignPincodeUpdate(Request $request , $id)
    {
     
        if($request->isMethod('post'))
        {
           
            
            foreach ($request->id as $key => $attribute) {
                if (!empty($attribute)) {
                    DeliveryPincode::where(['id' => $request->id[$key]])->update([
                            'allot_pincode' => $request->allot_pincode[$key]
                            ]);
                }
            }
            
           

        }
      
        $deliveryboy = Delivery::find($id);
        $deliveryBoyPincodewise = DeliveryPincode::with('deliveryboy')->where('delivery_boy_id',$id)->get();

        return redirect()->back()->with('status','Pincode Updated Successfully!');
    }
}
