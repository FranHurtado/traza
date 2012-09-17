<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
	 // Need to store the user's ID:
	 private $_id;
         
     const ERROR_ACTIVATION = 3;
     
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = User::model()->findByAttributes(array('email'=>$this->username));

		if ($user===null) { // No user found!
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else if ($user->password !== SHA1($this->password) ) { // Invalid password!
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
                } else if ($user->active == 0) { // Invalid password!
			$this->errorCode=self::ERROR_ACTIVATION;
		} else { // Okay!
		    $this->errorCode=self::ERROR_NONE;
		    // Store the role (user or admin) in a session:
		    $this->setState('role', $user->role);
			$this->_id = $user->ID;
		}
		return !$this->errorCode;
	}
	
	public function getId()
	{
	 return $this->_id;
	}
}