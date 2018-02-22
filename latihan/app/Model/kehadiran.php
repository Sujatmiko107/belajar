<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class kehadiran extends Model
{
  public $timestamps = false;
  protected $table='kehadiran';
  protected $fillable= ['*'];
}
