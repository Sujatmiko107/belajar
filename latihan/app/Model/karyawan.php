<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
  public $timestamps = false;
  protected $table='karyawan';
  protected $fillable= ['*'];
}
