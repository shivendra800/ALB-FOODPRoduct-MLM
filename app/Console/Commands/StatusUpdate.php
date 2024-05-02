<?php

namespace App\Console\Commands;

use Log;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class StatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:statusUpate';

    /**
     * The console command description.
     *
     *
     * @var string
     */
    protected $description = 'User Status Update';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
          $currentDate=Carbon::now()->format('Y-m-d');
        
        $alladmin = User::where('level_status',1)->get();
        foreach($alladmin as $admin)
        {
          $adminDate= Carbon::parse($admin->order_combo_product_date);

      
        

          $month = $adminDate->diffInDays($currentDate);
         
          if($month>30){
            User::where('id',$admin->id)->update(['level_status'=>0]);
          }
          \Log::info($month);

        }
    }
}
