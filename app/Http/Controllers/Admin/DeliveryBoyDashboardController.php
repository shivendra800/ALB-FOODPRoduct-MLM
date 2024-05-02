<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Exports\ExportExcelData;
use  Excel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DeliveryBoyDashboardController extends Controller
{
    public function dashboard()
    {

        $todayDate = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $product = Product::all();
        
        $totalUser = User::where('role_as','0')->count();

        $totalProducts = Product::count();
        $totalCategories = Category::count();

        
        $totalsale = DB::table('order_items')->sum(DB::raw('order_items.price * order_items.qty'));// this is not perfect calculaion we have to multipy with qty also
        $totalDaysaleOrder = OrderItem::whereDate('created_at',$todayDate)->sum(DB::raw('price * qty'));
        $totalSaleMonths = OrderItem::whereMonth('created_at',$thisMonth)->sum(DB::raw('price * qty'));
        $totalSaleYear = OrderItem::whereYear('created_at', $thisYear)->sum(DB::raw('price * qty'));

        $totalOrder = Order::count();
        $todayOrder = Order::whereDate('created_at',$todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at',$thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at', $thisYear)->count();

        $totalpending = Order::where('status','Pending')->count();
        $totalpendingtodayOrder = Order::where('status','Pending')->whereDate('created_at',$todayDate)->count();
        $totalpendingMonths = Order::where('status','Pending')->whereMonth('created_at',$thisMonth)->count();
        $totalpendingYearOrder = Order::whereYear('created_at', $thisYear)->where('status','Pending')->count();

       

       return view('admin.deliveryboydashboard' ,compact('product','totalUser',
                                                'totalProducts','totalCategories',
                                                  'totalUser','todayDate',
                                                    'thisMonth','thisYear','totalOrder' ,'todayOrder',
                                                    'thisMonthOrder','thisYearOrder',
                                                    'totalpending',
                                                    'totalpendingtodayOrder','totalpendingMonths',
                                                    'totalpendingYearOrder',
                                                    
                                                    'totalsale','totalDaysaleOrder','totalSaleMonths',
                                                    'totalSaleYear'
                                       ));
    }

    public function users()
    {
    $users = User::all();
    return view('admin.users.list_user',compact('users'));
    }

    public function viewusers($id)
    {
    $users = User::find($id);
    return view('admin.users.view_user',compact('users'));
    }
    private $memory_size = "1024M";
    public function stock_orverview_report_excel()
    {
        ini_set('memory_limit', $this->memory_size);
        $product = Product::all();

         $head = array([
      
           "Name",
           "Category",
           "Remaining Qty",
           "Original Qty",
           "Sold Qty",
           "Cost Price",
           "Original Price/Unit",
           "Selling Price/Unit",
           "Selling Amount",
           "Total Cost Amount",
           "Profit Amount",
             
             
         ]);
         foreach ($product as $item) {
             
             $array = array([
                
               $item->name ,
               $item->category->name ,
                $item->qty . $item->unit ,
               $item->original_qty . $item->unit ,
               $item->original_qty - $item->qty . $item->unit ,
                $item->cost_price. $item->unit ,
               $item->original_price . $item->unit ,
               $item->selling_price . $item->unit ,
               $item->selling_price * ($item->original_qty - $item->qty ) ,
               $item->cost_price * ($item->original_qty) ,
               ($item->selling_price * ($item->original_qty - $item->qty ))-($item->cost_price * ($item->original_qty - $item->qty)) ,
               
                
                
              ]);
             array_push($head, $array);
         }
         $export = new ExportExcelData($head);
         return Excel::download($export, 'stock_orverview_report.xlsx');
    }
}
