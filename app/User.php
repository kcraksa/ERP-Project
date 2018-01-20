<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;

class User extends Model
{
    protected $fillable = ['username','password'];

    public function profile()
    {
      return $this->hasOne('App\Profile');
    }
}
