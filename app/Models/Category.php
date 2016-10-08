<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
   protected $table = 'category';
   public $primaryKey = 'category_id';
   public $timestamps = false;
}
