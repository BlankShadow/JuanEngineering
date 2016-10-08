<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
   protected $table = 'comment';
   public $primaryKey = 'comment_id';
   public $timestamps = false;
}
