<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transformers\UserTransformer;
use App\User;

/**
 * 
 */
class AuthController extends Controller
{
	
	public function register(Request $request, User $user) {

		$this->validate($request, [
			'name'  => 'required',
			'email' => 'required|email',
			'password' => 'required:min:6',
		]);

		$user = [
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
			'api_token' => bcrypt($request->email),
		];

		$user = User::find(1);

		return fractal()
				->item($user)
				->transformWith(new UserTransformer)
				->toArray();
	}
}