<?php

namespace App\Http\Controllers;
/*use Request;*/
use Illuminate\Http\Request;
use Session;
use View;
use DB;
use URL;
use Redirect;
use stdClass;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Models\User ;
use App\Models\Verification ;
use App\Http\Controllers\ArtistProfileController;
use App\Http\Controllers\EmployerProfileController;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    public function isLoggedIn(){

      $flag=false;
      if(Session::has('userid')){
        $flag= true;
      }
      return $flag;

    }


    public function getLandingPage(){

        if($this->isLoggedIn()){
          $redirect=  URL::to('/profile');
          return Redirect::to($redirect);
        }else{

          return view('pages/index');
        }

    }


    public function getProfilePage(){

      $userid=Session::get('userid');
      $usertypeid=Session::get('usertypeid');
      $picture=Session::get('userpicture');
      $header_data=array('picture' => $picture);

      switch ($usertypeid) {
        case 1:
          $header=view('includes/header',$header_data);
          $data = (new ArtistProfileController)->getArtistProfilePage($userid);
          $data['header']=$header;
          return view('pages/artist/artist-profile', $data);
          break;
        case 2:
          $header=view('includes/employer-header',$header_data);
          $data = (new EmployerProfileController)->getEmployerProfilePage($userid);
          $data['header']=$header;

          return view('pages/employer/employer-profile', $data);
          break;
      }





    }



    public function getLoginModal(){

       return view('pages/index', ['show' => 'yes']);//add a variable to open modal
    }


    public function checkEmail(Request $request){

     $email=$request->email;
     $exists=count(User::where('email', $email)->get());
  		if ($exists > 0) {
  			return 'true';
  		} else {
  			return 'false';
  		}

    }

    public function checkAccount(Request $request){

        $status='Invalid';
        $email = $request->email;
        $password= $request->password;

         $user=DB::table('user')->where('email', $email)->first(); //changed from first only
         if($password==$user->password){
     			   if($user->verification_status==1){
               $status=$user->user_status;
             }else{
              $status='Unverified';
             }

             if($status=='New' or $status=='Active' or $status=='Unverified'){
               Session::put('userid', $user->user_id);
               Session::put('userpicture', $user->user_picture);
               Session::put('usertypeid', $user->user_type_id);
               Session::save();
             }
     		 }
         return $status;

    }
    public function generateVerificationCode() {

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 20; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;

      }

    public function sendMail(Request $request){

           $email=$request->email;
           $user = User::find($email);
           $username=$user['user_name'];
           // $password=$user['password'];
           // $code= $this->generateVerificationCode();

           $data=array('email' => $email,
                        'username' => $username,
                        'password'=>$password);
           
            Mail::send('pages.forgotpassword', $data, function($message) use ($data)
            {
              $message->to($data['email']);
              $message->subject($user['Forgot Password']);
            });
            // return view('pages/index', ['show' => 'yes']);

      } 
    public function logout(){

      Session::flush();
      $redirect=  URL::to('/');
      return Redirect::to($redirect);

    }

}
