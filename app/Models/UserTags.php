<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserTags extends Model
{
   protected $table = 'user_tags';
   public $primaryKey = 'user_tag_id';

   public $timestamps = false;
}
