<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FaqAnswer;

class FaqAnswerController extends Controller
{
    public function destroy($id) {

    	FaqAnswer::destroy($id);

    	return back()->with('message', 'Successfully deleted the answer');
    }

    public function store(Request $req) {

    	$this->validate($req, [
    		'faq_id' => 'required|numeric',
    		'answer' => 'required'
    	]);

    	$faq = FaqAnswer::create([
    		'faq_id' => $req->faq_id,
    		'answer' => $req->answer
    	]);

    	return redirect('admin/faq/'.$faq->faq_id)->with('message', 'Successfully added answer');
    }
}
