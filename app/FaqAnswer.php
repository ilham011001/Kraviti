<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqAnswer extends Model
{
    protected $fillable = ['faq_id', 'answer'];
}
