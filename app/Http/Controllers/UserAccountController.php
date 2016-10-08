<?php

namespace App\Http\Controllers;
/*use Request;*/
use Illuminate\Http\Request;
use Session;
use View;
use DB;
use URL;
use Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Models\User;
use App\Models\Follower;
use App\Models\Following;
use Intervention\Image\ImageManagerStatic as Image;



class UserAccountController extends Controller
{



    public function getAccountSettingsPage(){

      $userid=Session::get('userid');
      $usertypeid=Session::get('usertypeid');
      $user = User::find($userid);

      $data=array('user'=>$user,'header'=> $this->getHeader());
      return view('pages/user/account-setting', $data);

    }

    public function checkEmail(Request $request){

     $email=$request->email;
     $exists=count(User::where('email', $email)->get());
      if ($exists > 0) {
        return 'true';
      }else {
        return 'false';
      }

    }

    public function changeEmail(Request $request){

      $flag='false';
      $userid=Session::get('userid');
      $user = User::find($userid);
      $email=$request->email;
      $password= $request->password;


       if($password==$user->password){
         $user->email=$email;
         $user->save();
         $flag='true';
      }
      return $flag;

    }

    public function changePassword(Request $request){

      $flag='false';
      $userid=Session::get('userid');
      $user = User::find($userid);

      $oldpassword= $request->oldpassword;
      $newpassword= $request->newpassword;


       if($oldpassword==$user->password){
         $user->password=$newpassword;
         $user->save();
         $flag='true';
      }
      return $flag;

    }

    public function updateUserPicture(Request $request){

        $userid=Session::get('userid');
        $user = User::find($userid);

        if($request->hasFile('picture')){
          $image=Input::file('picture');
          $filename  = time() . '.' . $image->getClientOriginalExtension();
          $path = public_path('assets/img/profilepics/' . $filename);
          Image::make($image->getRealPath())->resize(150, 150)->save($path);
          $user->user_picture = $filename;
          Session::put('userpicture', $filename);
          Session::save();
        }

        $user->save();
        return redirect("/profile")->with('msg', 'Changes saved!');
    }


    public function updateUserInfo(Request $request){

        $userid=Session::get('userid');
        $user = User::find($userid);
        $user->user_name = $request->input('name');
        $user->user_bio = $request->input('bio');
        $user->user_location = $request->input('location');
        $user->user_url = $request->input('url');
        $user->save();

        return redirect("/profile")->with('msg', 'Changes saved!');
    }

    public function getProfilePage(Request $request){

      $username=$request->user_name;
      $user=User::where('user_name', $username)->first();
      $userid=$user['user_id'];
      $usertypeid=$user['user_type_id'];
      if($userid==Session::get('userid')){
        return redirect("/profile");
      }else{
        switch ($usertypeid) {
          case 1:
            $data = (new ArtistProfileController)->getArtistProfilePage($userid);
            $header=$this->getHeader();
            $data['header']=$header;
            return view($this->getArtistProfile(), $data); //change returning view
            break;
          case 2:
            $data = (new EmployerProfileController)->getEmployerProfilePage($userid);
            $header=$this->getHeader();

            $data['header']=$header;
            return view($this->getEmployerProfile(), $data); //change returning view
            break;

          }
      }
    }

    public function getHeader(){

      $picture=Session::get('userpicture');
      $header_data=array('picture' => $picture);
      $usertypeid=Session::get('usertypeid');
      switch ($usertypeid) {
        case 1:
          $header=view('includes/header',$header_data);
          break;
        case 2:
          $header=view('includes/employer-header',$header_data);
          break;
        }

      return $header;
    }

    public function getArtistProfile(){
      $usertypeid=Session::get('usertypeid');
      switch ($usertypeid) {
        case 1:
          $view="pages/artist/artist-view-artist";
          break;
        case 2:
          $view="pages/employer/employer-view-artist";
          break;
        }
      return $view;
    }

    public function getEmployerProfile(){
      $usertypeid=Session::get('usertypeid');
      switch ($usertypeid) {
        case 1:
          $view="pages/artist/artist-view-employer";
          break;
        case 2:
          $view="pages/employer/employer-view-employer";
          break;
        }
      return $view;

    }

    public function checkUsername(Request $request){

         $flag='true';
         $username=$request->username;
         $userid=Session::get('userid');
         $exists=User::where('user_name', $username)->get()->toArray();

          if (count($exists) > 0) {
            if($exists[0]['user_id']==$userid){
              $flag='false';
            }
          } else {
            $flag='false';
          }
          return $flag;

    }


    public function follow(Request $request){
      $status='';
      $f_userid=$request->user_id;
      $userid=Session::get('userid');

      $following_exists=Following::whereRaw("user_id=".$userid." and user_id_following=".$f_userid)->get()->toArray();
      if(count($following_exists)<1){

        $following=new Following;
        $following->user_id=$userid;
        $following->user_id_following=$f_userid;
        $following->save();
        $status='followed';

      }else{
          $following_u=Following::whereRaw("user_id=".$userid." and user_id_following=".$f_userid)->delete();
          $status='unfollowed';
      }

      return $status;

    }


}
