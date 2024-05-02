<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\PruchaseItem;
use App\Models\PruchaseBillLog;
use App\Models\Vendor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Exports\ExportExcelData;
use  Excel;

 

class PurchaseOrderController extends Controller
{
    // puchase stock------list
    public function index()
    {
        $product = Product::all();
        $vendor = Vendor::all();
        $pruchaseitem = PruchaseItem::all();
        return view('admin.purchase_order.index',compact('product','vendor','pruchaseitem'));
    }
    // search purchase stock search 
    
    function indexsearch(Request $request)
    {
       $product = Product::all();
        $vendor = Vendor::all();
        $pruchaseitem =  PruchaseItem::when($request->vendor_id != null , function ($q) use ($request)
        {
            return $q->where('vendor_id',$request->vendor_id);
        })
        ->when($request->start_date != null && $request->end_date != null , function ($q) use ($request){
            $q->whereBetween(DB::raw('DATE(created_at)'), [$request->start_date, $request->end_date]);
        })
       ->paginate(10);
        return view('admin.purchase_order.index',compact('product','vendor','pruchaseitem'));
    }
    // purchase stock excel------------------
    private $memory_size = "1024M";
    public function purchase_Stock_report_excel($start_date,$end_date,$vendor_id)
    {
        ini_set('memory_limit', $this->memory_size);
        $pruchaseitem = PruchaseItem::where('vendor_id',$vendor_id)->whereBetween(DB::raw('DATE(created_at)'), [$start_date, $end_date])
         ->get();


         $head = array([
      
            "Vendor Name",
            "Product Name",
             "Qty",
            "Purchase Rate",
            "Tax",
            "Total Rate",
            "Date",
             
             
         ]);
         foreach ($pruchaseitem as $value) {
             
             $array = array([
                
                $value->vendor->shop_name,
                $value->product->name,
                $value->qty,
                $value->price,
                $value->tax,
                $value->total_price,
                $value->created_at,
                
                
              ]);
             array_push($head, $array);
         }
         $export = new ExportExcelData($head);
         return Excel::download($export, 'Purchase-Stock-Excel-Report.xlsx');
    }
    // add puchase order---------------------------
    public function create()
    {
        $product = Product::all();
        $vendor = Vendor::all();
        return view('admin.purchase_order.add',compact('product','vendor'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        //    echo "<pre>";
        //     print_r($data);
        //     die;
        $rand_no = rand('00000',99999);
        $invoice_id = "PID_".$rand_no;
        foreach ($data['prod_id'] as $key => $value) {
            if (!empty($value)) {
                $purchase_item = new PruchaseItem;
                $purchase_item->prod_id = $value;
                $purchase_item->invoice_id = $invoice_id;
                $purchase_item->vendor_id = $data['vendor_id'];
                $purchase_item->unit = $data['unit'][$key];
                $purchase_item->price = $data['price'][$key];
                $purchase_item->qty = $data['qty'][$key];
                $purchase_item->tax = $data['tax'][$key];
                $purchase_item->total_price = $data['total_price'][$key];
                $purchase_item->previous_balance = $data['previous_balance'];
                $purchase_item->total_billing = $data['total_billing'];
                $purchase_item->grand_total = $data['grand_total'];
                $purchase_item->paid_amount = $data['paid_amount'];
                $purchase_item->remaining_amount = $data['remaining_amount'];
                $purchase_item->save();
                $purchase_item->status = 1;
                
            }
            // update qty originalqty and price rate in product table
            $update_vendor_tbl = Product::where('id',$value)->first();
            $update_vendor_tbl->qty = $update_vendor_tbl->qty + $data['qty'][$key];
            $update_vendor_tbl->original_qty = $update_vendor_tbl->original_qty + $data['qty'][$key];
            $update_vendor_tbl->cost_price =  $data['price'][$key];
            $update_vendor_tbl->update();

            // insert all price in purchase billing log table for all record of payemnts
            $pruchase_bill_log = new PruchaseBillLog();
            $pruchase_bill_log->invoice_id = $invoice_id;
            $pruchase_bill_log->vendor_id =  $data['vendor_id'];
            $pruchase_bill_log->previous_balance = $data['previous_balance'];
            $pruchase_bill_log->total_billing = $data['total_billing'];
            $pruchase_bill_log->grand_total = $data['grand_total'];
            $pruchase_bill_log->paid_amount = $data['paid_amount'];
            $pruchase_bill_log->remaining_amount = $data['remaining_amount'];
            $pruchase_bill_log->save();
           
        }
        
         
      
        // update remaining amount to vendor table 
        $update_vendor_tbl = Vendor::where('id',$request->vendor_id)->first();
        $update_vendor_tbl->v_wallet = $request->remaining_amount;
        $update_vendor_tbl->update();
        
        
        return redirect('/Purchase-Stock')->with('status','Purchase-Order Added Succsessfully');
    }
    public function destroy($id)
    {
        $purchase_item= PruchaseItem::find($id);
      
        $purchase_item->delete();
        return redirect('/Purchase-Stock')->with('status','Purchase-Order Deleted Succsessfully');
    }

    // vendor wise get privious balance
    public function vendor_wise_previous_balance($vendorid)
    {
        
         try {
          
            $vendor_pre_amt = Vendor::where('id',$vendorid)->first();
            $json['api_status'] = "OK";
            $json['data'] = $vendor_pre_amt;
            $json['msg'] = "";
        } catch (\Exception $e) {
            DB::rollback();
            
            $json['api_status'] = "ERROR";
            $json['msg'] = "Error-" . $e->getLine() . " :- " . $e->getMessage();
            
        }
        header('Content-type: application/json');
        echo json_encode($json);

    }
    // purhase history....................
    public function purchase_history()
    {
        $purchase_history =  Vendor::all();
        return view('admin.purchase_order.purchase_history')->with(compact('purchase_history'));
    }
    // pucase history search
    public function purchase_historysearch(Request $request)
    {
        $purchase_history = Vendor::when($request->vendor_id != null , function ($q) use ($request)
        {
            return $q->where('id',$request->vendor_id);
        })
        ->paginate(10);

         
         
        return view('admin.purchase_order.purchase_history')->with(compact('purchase_history'));
    }

    // purhase history details---------------
    public function purchase_history_details($vendor_id)
    {
        $purchase_history_details = DB::table('purchase_items')->select('purchase_items.invoice_id','purchase_items.vendor_id',
        'purchase_items.previous_balance','purchase_items.total_billing','purchase_items.grand_total',
        'purchase_items.paid_amount','purchase_items.remaining_amount','purchase_items.created_at')
                            ->where('purchase_items.vendor_id',$vendor_id)
                            ->groupBy('purchase_items.invoice_id')
                            ->get();

        // $purchase_history_details = PruchaseItem::where('vendor_id',$id)->get();
        return view('admin.purchase_order.purchase_history_details')->with(compact('purchase_history_details'));
    }
    // puchase history details search
    public function purchase_history_detailssearch(Request $request,$vendor_id)
    {

            $purchase_history_details = PruchaseItem::when($request->start_date != null && $request->end_date != null , function ($q) use ($request){
                $q->whereBetween(DB::raw('DATE(created_at)'), [$request->start_date, $request->end_date]);
            })
            ->where('purchase_items.vendor_id',$vendor_id)
            ->groupBy('purchase_items.invoice_id')
            ->paginate(10);
        // $purchase_history_details = DB::table('purchase_items')->select('purchase_items.invoice_id','purchase_items.vendor_id',
        // 'purchase_items.previous_balance','purchase_items.total_billing','purchase_items.grand_total',
        // 'purchase_items.paid_amount','purchase_items.remaining_amount','purchase_items.created_at')
        //                     ->where('purchase_items.vendor_id',$vendor_id)
        //                     ->groupBy('purchase_items.invoice_id')
        //                     ->get();

        // $purchase_history_details = PruchaseItem::where('vendor_id',$id)->get();
        return view('admin.purchase_order.purchase_history_details')->with(compact('purchase_history_details'));
    }
    // view all product list with invoice id
    public function view_all_product($invoice_id)
    {
        $view_all_product = DB::table('purchase_items')->select('purchase_items.invoice_id','purchase_items.qty','purchase_items.price',
        'purchase_items.total_price','products.name as product_name','products.image as product_image','purchase_items.previous_balance',
        'purchase_items.total_billing','purchase_items.grand_total',
        'purchase_items.paid_amount','purchase_items.remaining_amount','purchase_items.created_at')
                            ->join('products','products.id','=','purchase_items.prod_id')
                            ->where('purchase_items.invoice_id',$invoice_id)
                            ->get();

        return view('admin.purchase_order.purchase_product_list_with_invoice_id')->with(compact('view_all_product'));
        
    }
    // purchase bill update--------
    public function purchase_bill_update()
    {
        $purchase_history =  Vendor::all();
        return view('admin.purchase_order.purchase_bill_update')->with(compact('purchase_history'));
    }
    // purchase bill update view page
    public function purchase_bill_update_view($vendor_id)
    {
         $purchase_history= Vendor::find($vendor_id);
        return view('admin.purchase_order.purchase_bill_update_view')->with(compact('purchase_history'));
    }
    // purchase bill updatepay ment 
    public function purchase_bill_update_save(Request $request , $vendor_id)
    {
        
        
            // // update on vendor table remaining amount
            // $Vendorupdate= Vendor::find($vendor_id);
            // $Vendorupdate = new Vendor();
            // $Vendorupdate->v_wallet = $request->input('remaining_amount');
            
            // $Vendorupdate->update();
            $Vendorupdate = DB::table('vendor_register')->where('id',$vendor_id)
            ->update(array(
                'v_wallet'=>$request->get('remaining_amount')
            ));

             
            

            // insert new records in purchase bill log
            $bill_log_insert_data = new PruchaseBillLog();
            $bill_log_insert_data->vendor_id = $vendor_id;
            $bill_log_insert_data->previous_balance = $request->input('v_wallet');
            $bill_log_insert_data->paid_amount = $request->input('paid_amount');
            $bill_log_insert_data->remaining_amount = $request->input('remaining_amount');
            
            $bill_log_insert_data->save();

            return redirect('/Purchase-Bill-Update')->with('status','Purchase-Bill-Update Updated Succsessfully');
     
       
    
    }
    // puchase stock-----
    public function Stock()
    {
        // $product = Product::all();
        // $vendor = Vendor::all();
        // $pruchaseitem = PruchaseItem::all();
        $product = Product::all();
        return view('admin.purchase_order.purchase_stock',compact('product'));
    }

}