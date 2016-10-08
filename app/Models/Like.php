<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Like extends Model
{
   protected $table = 'tlike';
   public $primaryKey = 'like_id';
   public $timestamps = false;
}
