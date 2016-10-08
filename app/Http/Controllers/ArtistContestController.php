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


class ArtistContestController extends Controller
{



    public function addContestEntry(Request $request){

        $userid=Session::get('userid');

        $contest_entry = new ContestEntry;
        $contest_entry->conditions=$request->conditions;
        $contest_entry->contest_entry_desc=$request->contest_entry_desc;
        $contest_entry->contest_entry_status=1;
        $contest_entry->date_added=date("Y-m-d");
        $contest_entry->contest_id=$request->contestid;
        $contest_entry->user_id=$userid;

        if($request->hasFile('picture')){
          $image=Input::file('picture');
          $filename  = time() . '.' . $image->getClientOriginalExtension();
          $path = public_path('assets/img/contestentry/' . $filename);
          Image::make($image->getRealPath())->save($path);
          $contest_entry->file_name= $filename;
        }

        $contest_entry->save();

        return redirect("/contest/$request->contestid")->with('msg', 'Contest Entry Added Successfully!');
    }



}
