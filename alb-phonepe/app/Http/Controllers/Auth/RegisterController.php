<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $unique_no = User::orderBy('id', 'DESC')->pluck('id')->first();
            if ($unique_no == null or $unique_no == "") {
                $unique_no = 1;
            } else {
                $unique_no = $unique_no + 1;
            }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'member_id' => 'ALB-' . date("dY") . '-' . $unique_no,
            
                // strt core
 
                    $name = $data['name'],
                      $email = $data['email'],
                        $password = $data['password'],
                         $member_id = 'ALB-' . date("dY") . '-' . $unique_no,
                    $subject = "Register ALB Food Prdouct",

              $from = "info@albfoodproducts.in",
            
            $message = "
            
               
                   <h4>Name:$name</h4>
                    <h4>Email:$email</h4>
                     <h4>Password:$password</h4>
                      <h4>Member ID:$member_id</h4>
                     
                     
                              
                 
                           
                           
                               
                           
                         
            ",
            
            $headers = "From: $from \r\n",
            
            $headers .= "Content-type: text/html\r\n",
            
            
            mail($email,$subject,$message,$headers),
            
            /// end core 
            

            //Send Conifirmation Email
         $email = $data['email'],
        $messageData=[
            'email' =>$data['email'],
            'password' =>$data['password'],
            'name' =>$data['name'],
           
        ],
        Mail::send('mail.send_idpassregmail',$messageData,function($message)use($email){
            $message->to($email)->subject('Account Created Mail Of Albfoodproducts');
        })
        
        

        ]);
        
        
        

        
    }
}
