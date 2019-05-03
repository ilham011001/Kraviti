<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index() {

    	$contacts = Contact::all();
    	return view('backend.contact.index', compact('contacts'));
    }
}
