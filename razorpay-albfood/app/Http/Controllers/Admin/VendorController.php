<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors=Vendor::get();
        return view('admin.vendors.vendors')->with(compact('vendors'));
    }
    public function AddEditVendor(Request $request,$id = null)
    {
        if ($id == "") {
            $title = "Add Vendor";
            $vendor = new Vendor;
            $message = "vendor Add Successfully!";
        } else {
            $title = "Edit vendor";
            $vendor = Vendor::find($id);
            $message = "vendor Update Successfully!";
        }
            if ($request->isMethod('post')) {
                $data = $request->all();
                // echo "<pre>";
                // print_r($data);
                // die;

                // if($request->hasFile('shop_address_proof_image'))
                // {
                //  $file = $request->file('shop_address_proof_image');
                //  $ext = $file->getClientOriginalExtension();
                //  $filename = time().'.'.$ext;
                //  $file->move('admin_asset/uploads/vendor/',$filename);
                //  $vendor->shop_address_proof_image = $filename;

                // }

                $vendor->vendor_name = $data['vendor_name'];
                $vendor->shop_name = $data['shop_name'];
                $vendor->shop_email = $data['shop_email'];
                // $vendor->shop_address_proof = $data['shop_address_proof'];
                $vendor->shop_city = $data['shop_city'];
                $vendor->shop_state = $data['shop_state'];
                $vendor->shop_mobile = $data['shop_mobile'];
                $vendor->shop_pincode = $data['shop_pincode'];
                // $vendor->shop_business_license_number = $data['shop_business_license_number'];
                $vendor->shop_pan_number = $data['shop_pan_number'];
                $vendor->shop_gstno = $data['shop_gstno'];
                $vendor->shop_address = $data['shop_address'];
                $vendor->status = 1;
                $vendor->save();

                return redirect('vendors')->with('success_message', $message);
            }

        return view('admin.vendors.add_edit_vendor')->with(compact('title','vendor'));
    }
}
