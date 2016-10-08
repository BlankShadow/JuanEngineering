<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Following extends Model
{
   protected $table = 'following';
   public $primaryKey = 'following_id';
   public $timestamps = false;


}
