<?php
class UserModule extends CWebModule {
	
	static private $_user;
	/**
	 * Name of the tables in the database, to which the models are related to
	 */
	public $tableUser = 'user';
	public $tableUserLogin = 'user_login';
	
	/**
	 * @var int
	 * @desc items on page
	 */
	public $user_page_size = 10;
	
	/**
	 * hash method (md5,sha1 or algo hash function http://www.php.net/manual/en/function.hash.php)
	 * 
	 * @var string
	 */
	public $hash = 'md5';
	public $registrationUrl = array ("/user/registration");
	public $recoveryUrl = array ("/user/recovery/recovery");
	public $loginUrl = array ("/user/login");
	public $logoutUrl = array ("/user/logout");
	public $profileUrl = array ("/user/profile");
	public $returnUrl = array ("/user/profile");
	public $returnLogoutUrl = array ("/user/login");
	public $editProfileUrl = array("/user/profile/edit");
	public $changePasswordUrl = array("/user/profile/changepassword");
	
	/**
	 *
	 * @var boolean
	 */
	public $captcha = array ();
	
	public function init() {
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		
		// import the module-level models and components
		$this->setImport ( array (
				'user.models.*',
				'user.components.*' 
		) );
	}
	public function beforeControllerAction($controller, $action) {
		if (parent::beforeControllerAction ( $controller, $action )) {
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		} else
			return false;
	}
	
	/**
	 *
	 * @param
	 *        	$str
	 * @param
	 *        	$params
	 * @param
	 *        	$dic
	 * @return string
	 */
	public static function t($str = '', $params = array(), $dic = 'user') {
		return Yii::t ( "UserModule." . $dic, $str, $params );
	}
	
	/**
	 *
	 * @return hash string.
	 */
	public static function encrypting($string = "") {
		$hash = Yii::app ()->getModule ( 'user' )->hash;
		if ($hash == "md5")
			return md5 ( $string );
		if ($hash == "sha1")
			return sha1 ( $string );
		else
			return hash ( $hash, $string );
	}
	
	/**
	 *
	 * @param
	 *        	$place
	 * @return boolean
	 */
	public static function doCaptcha($place = '') {
		if (! extension_loaded ( 'gd' ))
			return false;
		if (in_array ( $place, Yii::app ()->getModule ( 'user' )->captcha ))
			return Yii::app ()->getModule ( 'user' )->captcha [$place];
		return false;
	}
	
	/**
	 * Return safe user data.
	 * @param user id not required
	 * @return user object or false
	 */
	public static function user($id=0) {
		if ($id)
			return User::model()->findbyPk($id);
		else {
			if(Yii::app()->user->isGuest) {
				return false;
			} else {
				if (!self::$_user)
					self::$_user = User::model()->findbyPk(Yii::app()->user->id);
				return self::$_user;
			}
		}
	}
	

	/**
	 * Send mail method
	 */
	public static function sendMail($email,$subject,$message) {
		$adminEmail = Yii::app ()->params ['adminEmail'];
		$headers = "MIME-Version: 1.0\r\nFrom: $adminEmail\r\nReply-To: $adminEmail\r\nContent-Type: text/html; charset=utf-8";
		$message = wordwrap($message, 70);
		$message = str_replace("\n.", "\n..", $message);
		return mail($email,'=?UTF-8?B?'.base64_encode($subject).'?=',$message,$headers);
	}
	
	/**
	 * Return admins.
	 * @return array syperusers names
	 */
	public static function getAdmins() {
		if (!self::$_admins) {
			$admins = User::model()->admin()->findAll();
			$return_name = array();
			foreach ($admins as $admin)
				array_push($return_name,$admin->username);
			self::$_admins = $return_name;
		}
		return self::$_admins;
	}
}
