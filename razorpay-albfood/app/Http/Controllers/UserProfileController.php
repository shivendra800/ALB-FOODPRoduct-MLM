<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\TotalAmountWithdraw;
use App\Models\WithdrawAmount;
use App\Models\WithdrwalLog;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;


class UserProfileController extends Controller
{

 

    public function uerprofile()
    {
        return view('front.profiles.user_profile');
    }
    public function index()
    {
        $admins = User::where('id','=',Auth::user()->id)->get();
        $allAdmins = User::pluck('name','parent_id')->where('parent_id','=',Auth::user()->id)->all();
        return view('front.profiles.tree.menuTreeview',compact('admins','allAdmins'));
        
    }

    public function LevelTransectionHistory()
    {
        $levelincome = DB::table('income2')->where('introid','=',Auth::user()->id)->get();
        return view('front.profiles.tree.level_transection_history',compact('levelincome'));
    }

    public function Userwallet()
    {
        
        $levelincome = DB::table('total_amount_withdraws')->where('user_id','=',Auth::user()->id)->first();
        // $date = Carbon::now();
        $getdiffdate =User::where('id',Auth::id())->first();
        $getlastorderdate = User::where('id',Auth::id())->where('order_combo_product_date','>=',Carbon::now())->first();
        $fromdate = User::where('id',Auth::id())->first();
        $todate = Carbon::now();
        $getcount =  $todate->diffInDays($fromdate['order_combo_product_date']);
        return view('front.profiles.tree.user_wallet',compact('levelincome','getlastorderdate','getcount','todate','fromdate','getdiffdate'));
    }
    public function WithdrwalWalletAmount()
    {
        $updatewalletAmt = TotalAmountWithdraw::where('user_id',Auth::id())->first();
        if(!empty($updatewalletAmt))
        {

            if($updatewalletAmt->total >=100){
                $updatewalletAmt->total = $updatewalletAmt->total -100;
                $updatewalletAmt->withdrwa_amount = 100;
                $updatewalletAmt->total_withdrwa_amount = $updatewalletAmt->total_withdrwa_amount + 100;
                $updatewalletAmt->Save();
    
                 $updatelevelstatus = User::where('id',Auth::id())->first();
                $updatelevelstatus->level_status=1;
                $updatelevelstatus->order_combo_product_date=Carbon::now()->addDays(30)->format('Y-m-d');
         
                $updatelevelstatus->save();
    
                $withdrwalogsave = new WithdrwalLog();
                $withdrwalogsave->user_id = Auth::id();
                $withdrwalogsave->withdraw_amt = 100;
                $withdrwalogsave->remaining_total_wamt =  $updatewalletAmt->total;
                $withdrwalogsave->save();

                return redirect('/User-wallet')->with('status',"Account Activated Successfully");
    
    
            }else{
                return redirect('/User-wallet')->with('status',"Your wallet Amount is no Sufficient to Activate account ,(Wallet Amount will be Atleast 100 For Activating Account. )");
            }

        }else{

            return redirect('/User-wallet')->with('status',"Your wallet Amount is no Sufficient to Activate account ,(Wallet Amount will be Atleast 100 For Activating Account. )");

        }
       
       


      
       
    }

    public function withdraw()
    {

        $updatewalletAmt = TotalAmountWithdraw::where('user_id',Auth::id())->first();
         $checkrequest = WithdrawAmount::where('user_id',Auth::id())->where('status','WithDraw Request Sent!')->first();
       return view('front.profiles.withdraw',compact('updatewalletAmt','checkrequest'));
    }

    public function apprvelList()
    {

         $withdrawapprequest = WithdrawAmount::where('user_id',Auth::id())->where('status','WithDraw Request Approved!')->get();
       return view('front.profiles.approvel_list',compact('withdrawapprequest'));
    }

    public function withdrawrequestsend(Request $request)
    {      
          $updatewalletAmt = TotalAmountWithdraw::where('user_id',Auth::id())->first();

          $request->validate([
            'bank_name' => 'required|string',
            'bank_ifsc_code' => 'required|string',
            'bank_branch' => 'required|string',
            'account_no' => 'required',
            'account_holder_name' => 'required|string',
            'withdraw_amount_req' => 'required|numeric|gt:0',
            'pan_no' =>'required',           
            
        ]);

          if($updatewalletAmt['total'] >= 500)
          {
              
            if($request->input('withdraw_amount_req') >= 500)
            {

                if($updatewalletAmt['total'] >= $request->input('withdraw_amount_req'))
                {
                    
        //              if($request->hasFile('pan_image'))
        // {
        //  $file = $request->file('pan_image');
        //  $ext = $file->getClientOriginalExtension();
        //  $filename = time().'.'.$ext;
        //  $file->move('admin_asset/pan_image/',$filename);
        
 
        // }


                    $user = User::where('id', Auth::id())->first();
                    

                    $user->bank_name = $request->input('bank_name');
                    //  $user->pan_image = $filename;
                    $user->bank_ifsc_code = $request->input('bank_ifsc_code');
                    $user->bank_branch = $request->input('bank_branch');
                    $user->account_no = $request->input('account_no');
                    $user->account_holder_name = $request->input('account_holder_name');
                      $user->pan_no = $request->input('pan_no');
                    $user->update();
            
            
                    $withdrawrequest = new WithdrawAmount();
                    
 
        //  $withdrawrequest->pan_image = $filename;
 
     
                    $withdrawrequest->user_id = Auth::id();
                    $withdrawrequest->bank_name = $request->input('bank_name');
                    $withdrawrequest->bank_ifsc_code = $request->input('bank_ifsc_code');
                    $withdrawrequest->bank_branch = $request->input('bank_branch');
                    $withdrawrequest->account_no = $request->input('account_no');
                    $withdrawrequest->account_holder_name = $request->input('account_holder_name');
                    $withdrawrequest->withdraw_amount_req = $request->input('withdraw_amount_req');
                    $withdrawrequest->total_amount = $updatewalletAmt->total;
                    $withdrawrequest->after_withdraw_total_amt = $updatewalletAmt->total - $request->input('withdraw_amount_req');
                    $withdrawrequest->status = "WithDraw Request Sent!";
                         $withdrawrequest->pan_no = $request->input('pan_no');
                    $withdrawrequest->save();
            
                    return redirect()->back()->with('status',"WithDarw Request Has Sent  Successfully");

                }else{
                    return redirect()->back()->with('status',"Request WithDraw Amount is Greater Than Total Withdraw Amount!");
                }

              

            }else{
                return redirect()->back()->with('status',"Min Amount For Withdraw Is 500 Rs !");

            }

         

          }else{

            return redirect()->back()->with('status',"Wallet amount Is Not Sufficent For WithDraw!");

          }

       
    }
    public function downloadinvoice($id)
    {
        $widtharapprin = WithdrawAmount::where('user_id',Auth::id())->where('id',$id)->where('status','WithDraw Request Approved!')->first();
       return view('front.profiles.download_invoice',compact('widtharapprin'));
    }
 
}
