<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ContestStatus extends Model
{
   protected $table = 'contest_status';
   public $primaryKey = 'contest_status_id';
   public $timestamps = false;
}
