<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use App\FaqAnswer;

class FaqController extends Controller
{
    public function index() {

    	$faqs = Faq::all();
    	return view('backend.faq.index', compact('faqs'));
    }

    public function create() {

    	return view('backend.faq.create');
    }

    public function store(Request $req) {

    	$this->validate($req, [
    		'faq' => 'required',
    		'answer1' => 'required'
    	]);

    	$save = Faq::create([
    		'faq' => $req->faq
    	]);

    	$faq_id = $save->id;
    	
    	for ($i=1; $i<=$req->countAnswer; $i++) {
    		$name = "answer".$i;
            if ($req->$name != "")
    	    	FaqAnswer::create([
    	    		'faq_id' => $faq_id,
    	    		'answer' => $req->$name
    	    	]);
	    }

	    return redirect('admin/faq')->with('message', 'Successfully added faq');
    }

    public function edit($id) {

    	$faq = Faq::find($id);
    	return view('backend.faq.edit', compact('faq'));
    }

    public function show($id) {

    	$faq = Faq::find($id);
    	return view('backend.faq.show', compact('faq'));
    }

    public function destroy($id) {

        Faq::destroy($id);

        return redirect('admin/faq')->with('message', 'Successfully deleted the faq');
    }

    public function update(Request $req, $id) {

        $faq = Faq::find($id);

        $validate = ['faq' => 'required'];
        foreach ($faq->faqAnswers as $key => $value) {
            $index = $key + 1;
            $name = "answer".$index;
            $validate[$name] = 'required';
        }

        $this->validate($req, $validate);

        $faq->update([
            'faq' => $req->faq
        ]);

        foreach ($faq->faqAnswers as $key => $answer) {
            $index = $key + 1;
            $value = "answer".$index;
            FaqAnswer::find($answer->id)->update([
                'answer' => $req->$value
            ]);
        }

        return redirect('admin/faq/'.$id)->with('message', 'Successfully updated the faq');

        
    }

}
