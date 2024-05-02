<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EcomController extends Controller
{
    public function EcomLoginData()
    {
        return view('admin.EcomApi.ecom_logindata');
    }
    public function ShipmentTrack()
    {
        return view('admin.EcomApi.shipment_track');
    }
    public function ShipmentTrackSearch(Request $request)
    {
        $awb = $request->awb;
        $curl = curl_init();
 
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://plapi.ecomexpress.in/track_me/api/mawbd/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('username' => 'ALBFOODPRODUCTS416210','password' =>'XJKXmpOIb8' ,'awb' =>$awb ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        //  return $response;
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $data = json_decode($json,TRUE);
        //  echo '<pre>'.json_encode($data,JSON_PRETTY_PRINT).'</pre>';

        // return view('admin.EcomApi.view_shipment_track',compact('data'));
        // return $data = json_decode($json,TRUE);
        // return $data["@attributes"]["version"][0];
        // return $data["object"]["field"][0];
        
        return view('admin.EcomApi.view_shipment_track')->with('data', $data);
     
      

    }

    public function FetchAWB()
    {
        return view('admin.EcomApi.fetch_awb');
    }

    public function FetchAWBNoSearch(Request $request)
    {
        $type = $request->type;
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.ecomexpress.in/apiv2/fetch_awb/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('username' => 'ALBFOODPRODUCTS416210','password' => 'XJKXmpOIb8','count' => '5','type' => $type),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        

     
        // return   $json = json_encode($response);
          $data = json_decode($response,TRUE);
        //  return $data["reference_id"];
        //   return $data["awb"];

        return view('admin.EcomApi.fetchawb_no_view')->with('data', $data);

    
    }
    public function SERVICEABILITY()
    {
        return view('admin.EcomApi.serviceablity');
    }


   public function SERVICEABILITYSearch(Request $request)
   {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.ecomexpress.in/apiv2/pincode/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('username' => 'ALBFOODPRODUCTS416210','password' => 'XJKXmpOIb8'),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
    

 
        // return   $json = json_encode($response);
        return  $data = json_decode($response,TRUE);
        //  return $data["reference_id"];
        //   return $data["awb"];
        return view('admin.EcomApi.serviceablity_view')->with('data', $data);

   }

   public function ShipmentCancellation()
   {
       return view('admin.EcomApi.shipment_cancellation');
   }

   public function ShipmentCancellationSearch(Request $request)
   {
       $awbs = $request->awbs;
       $curl = curl_init();

       curl_setopt_array($curl, array(
         CURLOPT_URL => 'https://api.ecomexpress.in/apiv2/cancel_awb/?=',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_POSTFIELDS => array('username' => 'ALBFOODPRODUCTS416210','password' => 'XJKXmpOIb8','awbs' => $awbs),
       ));
       
       $response = curl_exec($curl);
       
       curl_close($curl);
       // echo $response;

    
       // $json = json_encode($response);
       //    return  $data = json_decode($json,TRUE);

           $data = json_decode($response,TRUE);
        //    return    $data[0]['success'];

        // $data[0]['awb'];
        return view('admin.EcomApi.view_shipment_cancel')->with('data', $data);
     

   
    }
    
}
