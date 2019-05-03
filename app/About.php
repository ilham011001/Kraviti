<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    protected $fillable = ['description', 'vision', 'mission', 'image'];
}
