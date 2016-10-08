<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Verification extends Model
{
   protected $table = 'verification';
   public $primaryKey = 'user_id';
   public $timestamps = false;
}
