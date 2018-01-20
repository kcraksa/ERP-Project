<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupRole extends Model
{
    protected $fillable = ['group_name'];
    protected $table = 'grouproles';
}
