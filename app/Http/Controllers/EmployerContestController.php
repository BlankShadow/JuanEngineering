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
use App\Models\UserTags;
use App\Models\Category;
use App\Models\Contest;
use App\Models\ContestEntry;
use App\Models\Comment;
use App\Models\Report;
use App\Models\Like;
use Intervention\Image\ImageManagerStatic as Image;


class EmployerContestController extends Controller
{

    public function getNewContestPage(){

          $userid=Session::get('userid');
          $user = User::find($userid);
          $classification = Classification::get();
          $category = Category::get();

          $header_data=array('picture' => $user['user_picture']);
          $header=view('includes/employer-header',$header_data);
          $data=array('header' => $header,
                      'classification'=>$classification,
                      'category'=>$category);

          return view('pages/employer/employer-create-contest', $data);

    }



    public function addContest(Request $request){

        $userid=Session::get('userid');

        $contest = new Contest;
        $contest->contest_title=$request->title;
        $contest->contest_description=$request->desc;
        $contest->contest_deadline=$request->deadline;
        $contest->date_added=date("Y-m-d");
        $contest->user_id=$userid;
        $contest->contest_status_id=1;
        $contest->tag_id=$request->category;
        $contest->contest_prize=$request->prize;
        $contest->contest_text=$request->text;
        $contest->contest_preferences=$request->preferences;
        $contest->contest_others=$request->others;
        $contest->save();

        return redirect("/contest")->with('msg', 'Contest Added Successfully!');
    }


    public function updateContestBrief(Request $request){

      $contest = Contest::find($request->contest_id);
      $contest->contest_title=$request->title;
      $contest->contest_description=$request->desc;
      $contest->contest_deadline=$request->deadline;
      $contest->tag_id=$request->category;
      $contest->contest_prize=$request->prize;
      $contest->contest_text=$request->text;
      $contest->contest_preferences=$request->preferences;
      $contest->contest_others=$request->others;
      $contest->save();

      return redirect("/contest/$request->contest_id")->with('msg', 'Contest Brief has been updated! ');

    }











}
