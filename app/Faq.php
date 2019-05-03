<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['faq'];

    public function faqAnswers() {

    	return $this->hasMany('App\FaqAnswer');
    }
}
