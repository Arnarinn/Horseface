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
			echo 'fail';
		}
		else{
			echo "not fail";
		}
	}
}