<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\WithdrawAmount;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TotalAmountWithdraw;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TreeController extends Controller
{
    public function viewtree()
    {
        $admins = User::where('id','=',Auth::user()->id)->get();
       $allAdmins = User::pluck('name','parent_id')->where('id','=',Auth::user()->id)->all();
       return view('admin.tree.menuTreeview',compact('admins','allAdmins'));
    }
    
      public function withdrawrequest()
    {
         $withdrawrequest =  WithdrawAmount::where('status','WithDraw Request Sent!')->get();
       return view('admin.tree.withdraw_request',compact('withdrawrequest'));
    }

    public function updatewithdrawrequest(Request $request)
    {
        $withdrawid = $request->withdrawrequest_id;
    
        

        $withdrawrequest =  WithdrawAmount::where('id',$withdrawid)->first();
 
        if($request->hasFile('image'))
        {
         $file = $request->file('image');
         $ext = $file->getClientOriginalExtension();
         $filename = time().'.'.$ext;
         $file->move('admin_asset/upload_payment_slip/',$filename);
         $withdrawrequest->upload_payment_slip = $filename;
 
        }

       
        $unique_no = WithdrawAmount::orderBy('id', 'DESC')->pluck('id')->first();
        if ($unique_no == null or $unique_no == "") {
            $unique_no = 1;
        } else {
            $unique_no = $unique_no + 1;
        }

        $withdrawrequest->invoice_no = 'INVOICE-' . date("d-m-Y") . '-' . $unique_no;

        // $withdrawrequest->upload_payment_slip = $request->image;
 
        $withdrawrequest->transaction_id = $request->input('transaction_id');
        $withdrawrequest->status = "WithDraw Request Approved!";
        $withdrawrequest->update();


        $updatewalletAmt = TotalAmountWithdraw::where('user_id',$withdrawrequest['user_id'])->first();
        $updatewalletAmt->total = $updatewalletAmt->total - $request->input('withdraw_amount_req');
        $updatewalletAmt->withdrwa_amount = $request->input('withdraw_amount_req');
        $updatewalletAmt->total_withdrwa_amount = $updatewalletAmt->total_withdrwa_amount + $request->input('withdraw_amount_req');
        $updatewalletAmt->remark = "WithDraw Request Approved!";
        $updatewalletAmt->update();



        return redirect()->back()->with('status',"WithDarw Request Completed  Successfully!");
      



    }

    public function withdrawApproverequest()
    {

        $withdrawapprequest =  WithdrawAmount::where('status','WithDraw Request Approved!')->get();
        return view('admin.tree.withdraw_approverequest',compact('withdrawapprequest'));
    }


    public function AccountDetailsUserPdf($id)
    {
        
        $pdfaccount = WithdrawAmount::where('id', $id)->first();

        $pdf = Pdf::loadView('admin.account_details_user_pdf',compact('pdfaccount'))->setPaper('a4')->setOption([
            'tempDir' =>public_path(),
            'chroot' => public_path(),
        ]);

        return $pdf->download('AccountDetails-'.$pdfaccount['getuser']['name'].'-'.$pdfaccount['getuser']['member_id'].'.pdf');
    }



}
