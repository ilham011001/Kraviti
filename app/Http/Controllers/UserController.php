<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
    public function users(User $users) 
    {
    	$user = $users->all();

    	return fractal()
    			->collection($user)
    			->transformWith(new UserTransformer)
    			->toArray();
    }
}
