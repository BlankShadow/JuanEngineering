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
use App\Models\ContestStatus;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;


class ShopController extends Controller
{


    public function getCreativeShopPage(){
        $usertypeid=Session::get('usertypeid');
        $data=array('header' => $this->getHeader());
        switch ($usertypeid) {
          case 1:
            return view("pages/shop/creative-shop",$data);
            break;
          case 2:
            return view("pages/shop/employer-creative-shop",$data);
            break;
          }
    }

    public function getMyShopPage(){

        $data=array('header' => $this->getHeader());
        return view("pages/shop/my-shop",$data);

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



}
