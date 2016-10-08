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
use App\Models\ContestEntry;
use App\Models\Following;
use App\Models\Portfolio;
use Intervention\Image\ImageManagerStatic as Image;


class ArtistProfileController extends Controller
{

    public function getArtistProfilePage($userid){

        $user = User::find($userid)->toArray();
        $tags=UserTags::where('user_id', '=', $userid)
              ->select('category_id')
              ->get();
        $usertags=Category::find($tags->toArray())->toArray();
        $following=Following::whereRaw("user_id=".$userid)->get();
        $followers=Following::whereRaw("user_id_following=".$userid)->get();
        $data=array('user' => $user,
                    'following' => count($following),
                    'followers' => count($followers),
                    'is_followed' => $this->isFollowed($userid),
                    'user_tags' =>  $usertags,
                    'contest_entry' =>$this->getArtistPortfolio($userid),
                    'art_for_sale' =>'',
                    'uploaded_art' =>''
                    );

        return $data;

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

    public function getPortfolio(Request $request){

      $userid=$request->user_id;
      $contest_entry=ContestEntry::whereRaw("user_id=".$userid)->get()->toArray(); //select a column
      header('Content-Type: application/json');
      echo json_encode($contest_entry);
    }
    public function getSelectedPortfolio(Request $request){

      $userid=$request->user_id;
      $portfolio=Portfolio::join('contest_entry', 'contest_entry.contest_entry_id','=','portfolio.contest_entry_id')
                           ->whereRaw("portfolio.user_id=".$userid)->get()->toArray(); //select a column
      header('Content-Type: application/json');
      echo json_encode($portfolio);
    }

    public function getArtistPortfolio($userid){
      $portfolio=Portfolio::join('contest_entry', 'contest_entry.contest_entry_id','=','portfolio.contest_entry_id')
                           ->whereRaw("portfolio.user_id=".$userid)->get()->toArray(); //select a column
      return $portfolio;
    }

    public function savePortfolio(Request $request){
      $userid=Session::get('userid');
      $selected_entry=$request->get('portfolio_entry');
      Portfolio::whereRaw("user_id=".$userid)->delete();
      foreach($selected_entry as $entry){
        $portfolio=new Portfolio;
        $portfolio->user_id=$entry['user_id'];
        $portfolio->contest_entry_id=$entry['contest_entry_id'];
        $portfolio->save();
      }

    }



}
