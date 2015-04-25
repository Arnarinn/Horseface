<?php

class UserController extends BaseController{
	//this function is called when user goes to /register
	public function register(){
		return View::make('user.register');
	}
	public function post_register(){

		$rules = [
			'name' 					=> 'required',
			'email' 				=> 'required|email|unique:users',
			'password' 				=> 'required',
			'password_confirmation' => 'required|same:password'
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			
			$messages = $validator->messages();

			return Redirect::to("/register")
				->withErrors($messages)
				->withInput(Input::except("password", "password_confirmation"));

		}
		else{

			$user = new User;

			$user->name = Input::get("name");
			$user->email = Input::get("email");
			$user->password = Hash::make(Input::get("password"));

			if($user->save()){
				Auth::login($user);
				return Redirect::to("/");
			}

		}
	}
}