<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailer;
use View;
use DB;
use Redirect;
use Intervention\Image\ImageManagerStatic as Image;
use URL;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Models\User ;
use App\Models\Classification;
use App\Models\Verification;
use App\Models\Category;
use App\Models\UserTags;


class SignUpController extends Controller
{

      private $mailer;

      public function __construct(Mailer $mailer)
      {
          $this->mailer = $mailer;
      }

      //****************************//
      //    GET UI PAGES METHODS    //
      //    Author: Dhanica         //
      //----------------------------//

      public function getSignUpPage(){

          return view('pages/signup/signup');
      }

      public function getVerificationPage(Request $request){

           $userid=Session::get('userid');
           $user = User::find($userid);
           $email=$user->email;

           $verify = Verification::find($userid);
           $verificationCode=$verify->verification_code;
           $data=array('email' => $email,
                        'verificationCode' => $verificationCode,
                        'userid'=>$userid);
          $this->sendMail();
           return view('pages/signup/verifyaccount',$data); //temporary

      }

      public function getSignUpPageStep2(){

            return view('pages/signup/signup_step_2');

      }

      public function getSignUpPageStep3(){

             $classification = Classification::get();
             $category = Category::get();
             $data=array('classification'=>$classification,'category'=>$category);

            return view('pages/signup/signup_step_3', $data);

      }

      public function getSignUpPageStep4(){

            return view('pages/signup/signup_step_4');

      }


      //*******************************//
      //    SIGN UP FUNCTIONS (AJAX)   //
      //    Author: Dhanica            //
      //-------------------------------//


      public function checkEmail(Request $request){

           $email=$request->email;
           $exists=count(User::where('email', $email)->get());
        		if ($exists > 0) {
        			return 'true';
        		} else {
        			return 'false';
        		}

      }

      public function checkUsername(Request $request){

           $username=$request->username;
           $exists=count(User::where('user_name', $username)->get());
            if ($exists > 0) {
              return 'true';
            } else {
              return 'false';
            }

      }

      public function addUser(Request $request){

            $user = new User;
            $user->email = $request->email;
            $user->password= $request->password;
            $user->verification_status=0;
            $user->user_status="New";
            $user->date_joined=date("Y-m-d"); //update
            $user->save();
            $userid=$user->user_id;

            $verification = new Verification;
            $verification->verification_code=$this->generateVerificationCode();
            $verification->user_id=$userid;
            $verification->save();

            Session::put('userid', $userid);
            Session::save();

        }


        public function addUserType(Request $request){

          $userid=Session::get('userid');
          $user = User::find($userid);
          $user->user_type_id = $request->user_type_id;
          $user->user_status = 'Active';
          Session::put('usertypeid', $user->user_type_id);
          $user->save();

        }

        public function addUserTags(Request $request){

           $userid=Session::get('userid');
           $category=$request->category;

           foreach ($category as $cat ) {
             foreach ($cat as $c) {
               $userTags = new UserTags;
               $userTags->user_id=$userid;
               $userTags->category_id=$c;
               $userTags->save(); //CHANGE THIS TO IN(ids)
             }
           }

        }

        public function addUserInfo(Request $request){

          $userid=Session::get('userid');
          $user = User::find($userid);
          $user->user_name = $request->input('name');
          $user->user_bio = $request->input('bio');
          $user->user_location = $request->input('location');
          $user->user_url = $request->input('url');

          if($request->hasFile('picture')){
            $image=Input::file('picture');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('assets/img/profilepics/' . $filename);
            Image::make($image->getRealPath())->resize(150, 150)->save($path);
            $user->user_picture = $filename;
          }else{
            $user->user_picture = "default.png";
          }
          $user->save();

          Session::put('userpicture', $user->user_picture);
          Session::save();

          $redirect=  URL::to('/profile');
          return Redirect::to($redirect);

        }



        //**********************************//
        //   VERIFICATION PROCESS METHODS   //
        //    Author: Dhanica               //
        //----------------------------------//


      public function verifyUserAccount($userid, $verificationCode){

          $verify = Verification::find($userid);
          if($verify->user_id==$userid && $verify->verification_code==$verificationCode){
            $user = User::find($userid);
            $user->verification_status=1;
            $user->save();
            Session::forget('userid');
            return redirect('/')->with('verification_msg', 'Your account has been successfully verified. ');
          }

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



      //**********************************//
      //   SEND MAIL FUNCS               //
      //    Author: Dhanica              //
      //---------------------------------//

      public function sendMail(){

           $userid=Session::get('userid');
           $user = User::find($userid);
           $email=$user->email;
           $name = explode('@', $user->email);
            $verify = Verification::find($userid);
           $verificationCode=$verify->verification_code;
           $data=array('email' => $email,
                        'name'=>$name,
                        'verificationCode' => $verificationCode,
                        'userid'=>$userid);
          
           
            Mail::send('pages.testmail', $data, function($message) use ($data)
            {
              $message->to($data['email']);
              $message->subject('Account Verification');
            });

      }

      public function getInTouch(Request $request){
        // $name = $request->name;
         $name = $request->input('name');
        $email = $request->email;
        $mess = $request->mess;
        $data= array('email' => $email,
                        'name'=>$name,
                        'mess' => $mess);
         Mail::send('pages.message', $data, function($message) use ($data)
            {
              // $message->to('juancreatives2016@gmail.com');
              // $message->from('ynzzg8@gmail.com');
              $message->to('juancreatives2016@gmail.com');
              $message->from($data['email']);
            });
         return redirect('/')->with('status', 'Sent!'); 
      }

     
}