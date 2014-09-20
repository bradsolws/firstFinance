<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
	private $_id;
	
	/**
	 * Authenticates a user.
	 * 
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		$userLogin = UserLogin::model ()->notsafe ()->findByAttributes ( array (
				'username' => $this->username 
		) );
		if ($userLogin === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if (Yii::app ()->getModule ( 'user' )->encrypting ( $this->password ) !== $userLogin->password)
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else {
			$this->_id = $userLogin->user->user_id;
			$this->username = $userLogin->username;
			$this->setState('lastLoginTime', $userLogin->last_login);
			$this->errorCode = self::ERROR_NONE;
		}
		return ! $this->errorCode;
	}
	
	/**
	 *
	 * @return integer the ID of the user record
	 */
	public function getId() {
		return $this->_id;
	}
}