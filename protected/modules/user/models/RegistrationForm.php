<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * user registration form data. It is used by the 'registration' action of 'UserController'.
 */
class RegistrationForm extends UserLogin {
	public $verifyPassword;
	public $verifyCode;
	public function rules() {
		$rules = array (
				array (
						'username, password, verifyPassword',
						'required' 
				),
				array (
						'username',
						'length',
						'max' => 20,
						'min' => 6,
						'message' => UserModule::t ( "Incorrect username (length between 6 and 20 characters)." ) 
				),
				array (
						'username',
						'unique',
						'message' => UserModule::t ( "This username already exists." ) 
				),
				array (
						'password',
						'length',
						'max' => 128,
						'min' => 8,
						'message' => UserModule::t ( "Incorrect password (minimal length 8 characters)." ) 
				),
				array (
						'username',
						'match',
						'pattern' => '/^[A-Za-z0-9_]+$/u',
						'message' => UserModule::t ( "Incorrect symbols (A-z0-9)." ) 
				),
				array (
						'verifyPassword',
						'compare',
						'compareAttribute' => 'password',
						'message' => UserModule::t ( "Entered passwords do not match." ) 
				) 
		);
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'registration-form')
			return $rules;
		else
			array_push ( $rules, array (
					'verifyCode',
					'captcha',
					'allowEmpty' => ! UserModule::doCaptcha ( 'registration' ) 
			) );
		return $rules;
	}
}
