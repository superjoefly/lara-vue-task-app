<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Fillable Attributes
    protected $fillable = [
      'name',
      'user_id',
      'description'
    ];
}
