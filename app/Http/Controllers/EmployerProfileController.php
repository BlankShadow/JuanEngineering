<?php

namespace App\Http\Controllers;
/*use Request;*/
use Illuminate\Http\Request;
use Session;
use View;
use DB;
use URL;
use Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Models\User;
use App\Models\UserTags;
use App\Models\Category;
use App\Models\Contest;
use App\Models\ContestStatus;
use App\Models\ContestEntry;
use App\Models\Following;
use Intervention\Image\ImageManagerStatic as Image;



class EmployerProfileController extends Controller
{

    public function getEmployerProfilePage($userid){

        $user = User::find($userid)->toArray();
        $tags=UserTags::where('user_id', '=', $userid)
              ->select('category_id')
              ->get();
        $usertags=Category::find($tags->toArray())->toArray();
        $contests=$this->getContests($userid);
        $following=Following::whereRaw("user_id=".$userid)->get();
        $followers=Following::whereRaw("user_id_following=".$userid)->get();
        $data=array('user' => $user,
                    'user_tags' =>  $usertags,
                    'contests'=>$contests,
                    'following' => count($following),
                    'followers' => count($followers),
                    'is_followed' => $this->isFollowed($userid)
                  );

        return $data;
    }



  public function getContests($userid){
    if($userid==Session::get('userid') and Session::get('usertypeid')==2){
      $contestList=Contest::join('contest_winner', 'contest_winner.contest_id','=','contest.contest_id')
                          ->join('user', 'contest_winner.user_id','=','user.user_id')
                          ->whereRaw("contest.contest_status_id = 3 and contest.user_id=".$userid)
                          ->get();
    }else{
      $contestList= Contest::whereRaw("contest.user_id=".$userid)->get();
    }

    $i=0;
    $contests=array();

    foreach ($contestList as $contest) {
      $total_designs= $this->getContestTotalDesigns($contest->contest_id);
      $status=$this->getContestStatus($contest->contest_status_id);
      $contests[$i]=array(
          'contest_id'=>$contest->contest_id,
          'contest_title'=>$contest->contest_title,
          'contest_prize'=>$contest->contest_prize,
          'contest_description'=> $contest->contest_description,
          'contest_thumbnail'=>$this->getContestThumbnail($contest->contest_status_id,$contest->contest_id),
          'contest_tag'=> $this->getContestTag($contest->tag_id),
          'contest_status'=> $status,
          'contest_total_designs'=>$total_designs,
          'contest_days_left'=>$this->getContestDaysLeft($contest->contest_deadline),
      );
      $i++;
    }
    return $contests;
  }


  ///SHOULD DELETE THESE METHODS BELOW AND REFER TO CONTEST CONTROLLER  BC REDUNDANT ALREADY BUT FOR THE MEAN TIME GORABELLS
  public function getContestTag($tag_id){

    $tag_name=Category::where('category_id', '=', $tag_id)
                      ->select('category_name')
                      ->get()->first();

    return $tag_name['category_name'];

  }

  public function getContestStatus($status_id){

    $status=ContestStatus::where('contest_status_id', '=', $status_id)
                          ->select('contest_status_label')
                          ->get()->first();
    return $status['contest_status_label'];

  }

  public function getContestTotalDesigns($contest_id){

    $total_designs=ContestEntry::where('contest_id', '=', $contest_id)->get()->count();
    return $total_designs;

  }

  public function getContestDaysLeft($deadline){

    $deadline= new Carbon($deadline);
    $datenow=new Carbon(date('Y-m-d'));
    $daysLeft=$deadline->diffInDays($datenow);
    return $daysLeft;

  }

  public function getContestThumbnail($status_id,$contest_id){
    if($status_id==3){
      $contest_entry=ContestEntry::join('contest_winner', 'contest_winner.contest_id','=','contest_entry.contest_id')
                                  ->where('contest_entry.contest_id', '=', $contest_id)
                                  ->first();
      $filename=$contest_entry->file_name;
    }else{
      $filename='default_blind.png';
    }
    return $filename;

  }

  public function isFollowed($f_userid){
    $userid=Session::get('userid');
    $following_exists=Following::whereRaw("user_id=".$userid." and user_id_following=".$f_userid)->get()->toArray();
    if(count($following_exists)>0){
      return true;
    }else{
      return false;
    }
  }

}
