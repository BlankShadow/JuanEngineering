<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Follower extends Model
{
   protected $table = 'follower';
   public $primaryKey = 'follower_id';
   public $timestamps = false;


}
