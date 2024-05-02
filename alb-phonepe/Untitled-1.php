 $getorderitem = OrderItem::where('order_id', $orders['id'])->first();
        $getprod= Product::where('id', $getorderitem->prod_id)->first();
        if(!empty($getprod))
        {
         return $findprodcombo = Product::where('id', $getprod->prod_id)->where('cate_id','9')->first();
        }





        $arr = User::where('id',$orders['user_id'])->orderby('id','desc')->take(5)->get();
        foreach ($arr as $value) {
            $asf= new MLMIncome();
            $asf->position = $value['id'];
            $asf->save();
        }














        if ($getorderitem['cate_id'] = '9') {
            $getuserid = User::where('id', $orders->user_id)->first();
            $adminid = User::where('id', '1')->first();
            if ($getuserid->sponser_id != $getuserid->member_id) {
                if ($getuserid->member_id != $adminid->member_id) {
                    $aa = 1;
                    while ($getuserid->member_id != $adminid->member_id) {


                        if ($aa == 1) {

                            $amount = (10 * $getprod->cost_price) / 100;
                            $remainng_amount = $getprod->cost_price - $amount;
                            $percentage = 10;
                        }

                        if ($aa == 2) {
                            $amount1 = (10 * $getprod->cost_price) / 100;
                            $remainng_amount1 = $getprod->cost_price - $amount1;

                            $amount = (8 * $remainng_amount1) / 100;
                            $remainng_amount = $remainng_amount1 - $amount;
                            $percentage = 8;
                        } elseif ($aa == 3) {
                            $amount1 = (10 * $getprod->cost_price) / 100;
                            $remainng_amount1 = $getprod->cost_price - $amount1;

                            $amount2 = (8 * $remainng_amount1) / 100;
                            $remainng_amount2 = $remainng_amount1 - $amount2;

                            $amount = (5 * $remainng_amount2) / 100;
                            $remainng_amount = $remainng_amount2 - $amount;
                            $percentage = 5;
                        } elseif ($aa == 4) {
                            $amount1 = (10 * $getprod->cost_price) / 100;
                            $remainng_amount1 = $getprod->cost_price - $amount1;

                            $amount2 = (8 * $remainng_amount1) / 100;
                            $remainng_amount2 = $remainng_amount1 - $amount2;

                            $amount3 = (5 * $remainng_amount2) / 100;
                            $remainng_amount3 = $remainng_amount2 - $amount3;

                            $amount = (4 * $remainng_amount3) / 100;
                            $remainng_amount = $remainng_amount3 - $amount;
                            $percentage = 4;
                        } elseif ($aa == 5) {
                            $amount1 = (10 * $getprod->cost_price) / 100;
                            $remainng_amount1 = $getprod->cost_price - $amount1;

                            $amount2 = (8 * $remainng_amount1) / 100;
                            $remainng_amount2 = $remainng_amount1 - $amount2;

                            $amount3 = (5 * $remainng_amount2) / 100;
                            $remainng_amount3 = $remainng_amount2 - $amount3;

                            $amount4 = (4 * $remainng_amount3) / 100;
                            $remainng_amount4 = $remainng_amount3 - $amount4;

                            $amount = (3 * $remainng_amount4) / 100;
                            $remainng_amount = $remainng_amount4 - $amount;
                            $percentage = 3;
                        }

                        //      $freshid = User::where('id',$orders->user_id)->first();
                        //    $admininuser = User::where('member_id', $freshid->member_id)->first();
                        //    $memberid= $admininuser->member_id; // memberid  by akash sir code
                        //       $issueHealthtbl= User::where('member_id',$memberid)->first();
                        //          $introducerid = $issueHealthtbl->sponser_id;

                        //   $healthcardtbl= User::where('member_id','=',$introducerid)->first();

                        //     $introid = $healthcardtbl->id;

                        //   $introducerid = $healthcardtbl->member_id;
                        //   $introname = $healthcardtbl->name;
                        //   $introstatus = $healthcardtbl->level_status;
                        if ($amount > 0) {


                            $user['introid'] = 1;
                            $user['intronewid'] =  1;
                            $user['introname'] = "jj";
                            $user['rs'] = $amount;
                            $user['date'] = date('d');
                            $user['month'] =  date('m');
                            $user['year'] =  date('Y');
                            $user['status'] = 1;
                            $user['point'] = 5;
                            $user['package'] = $getprod->cost_price;
                            $user['remainng_amount'] = $remainng_amount;

                            $user['members'] = "j";
                            $user['position'] = $aa;
                            $user['custid'] = 0;
                            $user['custnewid'] = "jj";
                            $user['custname'] =  'jj';
                            $user['paidstatus'] = 1;

                            $user['percentage'] = $percentage;
                            $lastinsertedID =  DB::table('income2')->insertGetId($user);
                        }




                        $aa = $aa + 1;
                        if ($aa > 5) {
                            $memberid = $adminid->member_id;
                        }
                    }
                }
            }
        } else {
            return    $ststus = 0;
        }








































        public function updatestatus(Request $request)
    {


        <!-- $status_id = $request->get('status_id'); -->
        $statuschange = User::where('id', $orders->user_id)->first();
        $freshid = $statuschange->member_id; //freshid by akash sir code
       
        <!-- $authmemberid = Auth::guard('admin')->user()->member_id; -->
        $authmemberid = "ALB-202023-1";
        <!-- $admin_dummy_wallet = Admin::where('id', Auth::guard('admin')->user()->id)->first(); -->
        <!-- $companyid  =  $admin_dummy_wallet->member_id; //companyid by akash sir code -->
        $companyid  =  "ALB-202023-1"; //companyid by akash sir code

        $admininuser = User::where('member_id', $freshid)->first();
        $memberid = $admininuser->member_id; // memberid  by akash sir code
        $custname = $admininuser->name; // custname  by akash sir code
        $custnewid = $admininuser->member_id; // custnewid  by akash sir code
        $timeofgeneration = $admininuser->order_combo_product_date; // timeofgeneration  by akash sir code

        <!-- $admininactive = Admin::where('id', $status_id)->first(); -->
        $issueHealth = Product::where('id', $getorderitem->prod_id)->where('cate_id', '9')->first();
        <!-- $issueHealth = IssueHealthCard::where('id', $admininactive->health_card_customer_id)->first(); -->

        $package = $issueHealth->cost_price; //package   by akash sir code

        // DB::enableQueryLog();

        $getactivesponsorid = User::where('member_id', $statuschange->sponser_id)->first();




        $sponsor_id = $statuschange->sponser_id;
        //    if auth ki member id and sponsor id same h to is condition me ni jayega qki yha se hme lastinserted id ni mil payegi
        if ($sponsor_id != $authmemberid) {
            if ($freshid != $companyid) {


                $aa = 1;
                while ($memberid != $companyid) {


                    if ($aa == 1) {

                        $amount = (10 * $package) / 100;
                        $remainng_amount = $package - $amount;
                        $percentage = 10;
                    }

                    if ($aa == 2) {
                        $amount1 = (10 * $package) / 100;
                        $remainng_amount1 = $package - $amount1;

                        $amount = (8 * $remainng_amount1) / 100;
                        $remainng_amount = $remainng_amount1 - $amount;
                        $percentage = 8;
                    } elseif ($aa == 3) {
                        $amount1 = (10 * $package) / 100;
                        $remainng_amount1 = $package - $amount1;

                        $amount2 = (8 * $remainng_amount1) / 100;
                        $remainng_amount2 = $remainng_amount1 - $amount2;

                        $amount = (5 * $remainng_amount2) / 100;
                        $remainng_amount = $remainng_amount2 - $amount;
                        $percentage = 5;
                    } elseif ($aa == 4) {
                        $amount1 = (10 * $package) / 100;
                        $remainng_amount1 = $package - $amount1;

                        $amount2 = (8 * $remainng_amount1) / 100;
                        $remainng_amount2 = $remainng_amount1 - $amount2;

                        $amount3 = (5 * $remainng_amount2) / 100;
                        $remainng_amount3 = $remainng_amount2 - $amount3;

                        $amount = (4 * $remainng_amount3) / 100;
                        $remainng_amount = $remainng_amount3 - $amount;
                        $percentage = 4;
                    } elseif ($aa == 5) {
                        $amount1 = (10 * $package) / 100;
                        $remainng_amount1 = $package - $amount1;

                        $amount2 = (8 * $remainng_amount1) / 100;
                        $remainng_amount2 = $remainng_amount1 - $amount2;

                        $amount3 = (5 * $remainng_amount2) / 100;
                        $remainng_amount3 = $remainng_amount2 - $amount3;

                        $amount4 = (4 * $remainng_amount3) / 100;
                        $remainng_amount4 = $remainng_amount3 - $amount4;

                        $amount = (3 * $remainng_amount4) / 100;
                        $remainng_amount = $remainng_amount4 - $amount;
                        $percentage = 3;
                    } elseif ($aa == 6) {
                        $amount1 = (10 * $package) / 100;
                        $remainng_amount1 = $package - $amount1;

                        $amount2 = (8 * $remainng_amount1) / 100;
                        $remainng_amount2 = $remainng_amount1 - $amount2;

                        $amount3 = (5 * $remainng_amount2) / 100;
                        $remainng_amount3 = $remainng_amount2 - $amount3;

                        $amount4 = (4 * $remainng_amount3) / 100;
                        $remainng_amount4 = $remainng_amount3 - $amount4;

                        $amount5 = (3 * $remainng_amount4) / 100;
                        $remainng_amount5 = $remainng_amount4 - $amount5;

                        $amount = (2 * $remainng_amount5) / 100;
                        $remainng_amount = $remainng_amount5 - $amount;
                        $percentage = 2;
                    }


                    $issueHealthtbl = User::where('member_id', $memberid)->first();
                    $introducerid = $issueHealthtbl->sponser_id;

                    $healthcardtbl = User::where('member_id', '=', $introducerid)->first();

                    $introid = $healthcardtbl->id;

                    $introducerid = $healthcardtbl->member_id;
                    $introname = $healthcardtbl->name;
                    $introstatus = $healthcardtbl->level_status;
                    if ($introstatus != 0 && $amount > 0) {


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
                        $lastinsertedID =  DB::table('income2')->insertGetId($user);
                       
                    }

                    


                    $memberid = $introducerid;
                    $aa = $aa + 1;
                    if ($aa > 6) {
                        $memberid = $companyid;
                    }
                }
            }
        }
    }
