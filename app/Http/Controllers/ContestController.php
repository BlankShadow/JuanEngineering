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
use App\Models\Classification;
use App\Models\ContestStatus;
use App\Models\ContestWatcher;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;


class ContestController extends Controller
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


    public function getContestViewPage($contestid){

          $userid=Session::get('userid');
          $contest = Contest::find($contestid);
          $contest_entry_list=ContestEntry::where('contest_id', '=', $contestid)->get();
          $user = User::find($contest->user_id);
          $classification = Classification::get();
          $category = Category::get();
          $data=array('header' => $this->getHeader(),
                      'user'=>$user,
                      'contest'=>$contest,
                      'is_watched'=>$this->isWatched($contestid),
                      'contest_entry_list'=>$this->getContestEntries($contestid),
                      'classification'=>$classification,
                      'category'=>$category);
          if($userid==$contest->user_id){
            $view="pages/employer/employer-contest-view";
          }else{
            $view=$this->getContestView();
          }

          return view($view, $data);

    }


    public function getContestView(){

        $usertypeid=Session::get('usertypeid');
        switch ($usertypeid) {
          case 1:
              $view="pages/contest/contest-view";
              break;
          case 2:
              $view="pages/employer/employer-view-contest";
              break;
        }
        return $view;

    }


    public function getContestPage(){

          $usertypeid=Session::get('usertypeid');
          $data=array('header' => $this->getHeader());
          switch ($usertypeid) {
            case 1:
              $category=Category::get();
              $classification=Classification::get();
              $data['classification']=$classification;
              $data['category']=$category;
              return view("pages/contest/browse-contest",$data);
              break;
            case 2:
              return view("pages/employer/employer-contest",$data);
              break;

            }

    }


    public function getMyContestsPage(){

        $data=array('header' => $this->getHeader());
        return view("pages/contest/my-contest-active",$data);

    }


    public function getEmployerContests(Request $request){

        switch($request->status){
          case 'all-active':
                $no=3;
                $query="contest_status_id <> ".$no;
                break;
          case 'qualifying':
                $query="contest_status_id = 1";
                break;
          case 'choosing':
                $query="contest_status_id = 2";
                break;
          case 'finished':
                $query="contest_status_id = 3";
                break;
        }

        $i=0;
        $contests=array();
        $userid=Session::get('userid');
        $contestList = Contest::whereRaw($query." and user_id=".$userid)->get();

        foreach ($contestList as $contest) {
          $total_designs= $this->getContestTotalDesigns($contest->contest_id);
          $contests[$i]=array(
              'contest_id'=>$contest->contest_id,
              'contest_title'=>$contest->contest_title,
              'contest_prize'=>$contest->contest_prize,
              'contest_description'=> $contest->contest_description,
              'contest_date_added'=> $contest->date_added,
              'contest_thumbnail'=>$this->getEmployerContestThumbnail($contest->contest_id),
              'contest_tag'=> $this->getContestTag($contest->tag_id),
              'contest_status'=> $this->getContestStatus($contest->contest_status_id) ,
              'contest_total_designs'=>$total_designs,
              'contest_days_left'=>$this->getContestDaysLeft($contest->contest_deadline)
          );
          $i++;
        }

        header('Content-Type: application/json');
        echo json_encode($contests);

    }

    public function getAllContests(){

      $i=0;
      $contests=array();
      $contestList = Contest::join('user', 'contest.user_id','=','user.user_id')->get();


      foreach ($contestList as $contest) {
        $total_designs= $this->getContestTotalDesigns($contest->contest_id);
        $contests[$i]=array(
            'user_name'=>$contest->user_name,
            'contest_id'=>$contest->contest_id,
            'contest_title'=>$contest->contest_title,
            'contest_prize'=>$contest->contest_prize,
            'contest_description'=> $contest->contest_description,
            'contest_date_added'=> $contest->date_added,
            'contest_thumbnail'=>$this->getArtistContestThumbnail($contest->contest_id,$contest->contest_status_id),
            'contest_tag'=> $this->getContestTag($contest->tag_id),
            'contest_status'=> $this->getContestStatus($contest->contest_status_id) ,
            'contest_total_designs'=>$total_designs,
            'contest_days_left'=>$this->getContestDaysLeft($contest->contest_deadline)
        );
        $i++;
      }

      header('Content-Type: application/json');
      echo json_encode($contests);

    }


    public function getHeader(){

        $picture=Session::get('userpicture');
        $header_data=array('picture' => $picture);
        $usertypeid=Session::get('usertypeid');
        $header='';
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


    public function getContestEntries($contestid){

          $contest=Contest::find($contestid);
          $contest_entry_list=ContestEntry::join('user', 'user.user_id','=','contest_entry.user_id')
                                            ->where('contest_entry.contest_id', '=', $contestid)
                                            ->get();

          $i=0;
          $entries=array();

          foreach($contest_entry_list as $contest_entry){
              if($contest->user_id==Session::get('userid') || $contest->contest_status_id==3){
                $filename=$contest_entry->file_name;
              }else{
                $filename="default_blind.png";
              }
              $entries[$i++]= array(
                        'contest_entry_id'=>$contest_entry->contest_entry_id,
                        'user_name'=>$contest_entry->user_name,
                        'file_name'=>$filename,
                        'user_id'=>$contest_entry->user_id,
                        'contest_entry_no'=>$contest_entry->contest_entry_no
                        );

          }

          return $entries;

    }


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


    public function getEmployerContestThumbnail($contest_id){

        $contest_entry=ContestEntry::where('contest_id', '=', $contest_id)->get()->first();
        if($contest_entry['file_name']==''){
          $filename='default_nodesigns.png';
        }else{
          $filename=$contest_entry['file_name'];
        }
        return $filename;

    }


    public function getArtistContestThumbnail($contest_id,$status_id){

        $contest_entry=ContestEntry::where('contest_id', '=', $contest_id)->get()->first();
        if($status_id>2){
            $filename=$contest_entry['file_name'];
        }else{
          $filename='default_blind.png';
        }
        return $filename;

    }



    public function getDesignDetails(Request $request){

      $contest_entry=DB::table('contest_entry')
                          ->join('user', 'user.user_id','=','contest_entry.user_id')
                          ->where('contest_entry.contest_entry_id', '=', $request->contest_entry_id)
                          ->first();

      header('Content-Type: application/json');
      echo json_encode( $contest_entry);

    }

    public function getDesignComments(Request $request){


      $comments=DB::table('comment')
                          ->join('user', 'user.user_id','=','comment.user_id')
                          ->whereRaw("comment.object_id = ".$request->contest_entry_id." and comment.object_type='contest_entry'")
                          ->get();
      header('Content-Type: application/json');
      echo json_encode($comments);

    }

    public function addDesignComment(Request $request){

      $userid=Session::get('userid');

      $comment = new Comment;
      $comment->comment_entry=$request->comment_entry;
      $comment->date_added=date("Y-m-d");
      $comment->object_type="contest_entry";
      $comment->object_id=$request->contest_entry_id;
      $comment->user_id=$userid;
      $comment->save();

    }

    public function deleteDesignComment(Request $request){

      $comment= Comment::find($request->comment_id);
      $comment->delete();

    }

    public function addLike(Request $request){

      $userid=Session::get('userid');

      $exists=Like::whereRaw("object_id = ".$request->contest_entry_id." and object_type='contest_entry' and user_id=".$userid)
                  ->first();
      if(count($exists)){
        $like= Like::find($exists->like_id);
        $like->delete();
      }else{
        $like = new Like;
        $like->date_added=date("Y-m-d");
        $like->object_type="contest_entry";
        $like->object_id=$request->contest_entry_id;
        $like->user_id=$userid;
        $like->save();
      }

      $this->getDesignLikes($request);

    }

    public function deleteLike(Request $request){

      $like= Like::find($request->like_id);
      $like->delete();

      $this->getDesignLikes($request);

    }

    public function getDesignLikes(Request $request){


      $likes=Like::join('user', 'user.user_id','=','tlike.user_id')
                  ->whereRaw("tlike.object_id = ".$request->contest_entry_id." and tlike.object_type='contest_entry'")
                  ->get();
      header('Content-Type: application/json');
      echo json_encode($likes);

    }

    public function addReport(Request $request){

      $userid=Session::get('userid');
      $report = new Report;
      $report->date_reported=date("Y-m-d");
      $report->report_comment=$request->report_comment;
      $report->object_id=$request->contest_entry_id;
      $report->user_id=$userid;
      $report->report_desc=$request->report_desc;

      if($request->hasFile('picture')){
        $image=Input::file('picture');
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('assets/img/reports/' . $filename);
        Image::make($image->getRealPath())->save($path);
        $report->file_name = $filename;
      }
      $report->save();

      return redirect("/contest/$request->contest_id")->with('msg', 'Your report has been submitted. Wait for an email notification regarding its status. ');

    }

    public function watch(Request $request){

      $status='';
      $contestid=$request->contestid;
      $userid=Session::get('userid');

      $watch_exists=ContestWatcher::whereRaw("user_id=".$userid." and contest_id=".$contestid)->get()->toArray();
      if(count($watch_exists)<1){

        $watch=new ContestWatcher;
        $watch->user_id=$userid;
        $watch->contest_id=$contestid;
        $watch->save();
        $status='watched';

      }else{
          $watch=ContestWatcher::whereRaw("user_id=".$userid." and contest_id=".$contestid)->delete();
          $status='unwatched';
      }

      return $status;
    }

    public function isWatched($contestid){
      $userid=Session::get('userid');
      $watch_exists=ContestWatcher::whereRaw("user_id=".$userid." and contest_id=".$contestid)->get()->toArray();
      if(count($watch_exists)>0){
        return true;
      }else{
        return false;
      }
    }


}
