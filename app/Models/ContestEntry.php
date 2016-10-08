<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ContestEntry extends Model
{
   protected $table = 'contest_entry';
   public $primaryKey = 'contest_entry_id';
   public $timestamps = false;
}
