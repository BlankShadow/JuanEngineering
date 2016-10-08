<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Classification extends Model
{
   protected $table = 'classification';
   public $primaryKey = 'classification_id';
   public $timestamps = false;
}
