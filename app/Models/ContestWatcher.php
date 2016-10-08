<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ContestWatcher extends Model
{
   protected $table = 'contest_watcher';
   public $primaryKey = 'contest_watcher_id';
   public $timestamps = false;
}
