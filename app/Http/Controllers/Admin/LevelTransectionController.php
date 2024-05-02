<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AdminTransectionHistory;

class LevelTransectionController extends Controller
{
    public function LevelTransectionHistory()
    {
        $levelincome = DB::table('income2')->get();
       
        return view('admin.tree.level_transection_history',compact('levelincome'));
    }

    public function AdminAllTransectionHistory()
    {
        $levelincome = AdminTransectionHistory::get();
       
        return view('admin.tree.adminalltransection_history',compact('levelincome'));
    }


   
    
 
}
