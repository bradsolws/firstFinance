<?php
class RegistrationController extends Controller {
	public $defaultAction = 'registration';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return (array (
				'captcha' => array (
						'class' => 'CCaptchaAction',
						'backColor' => 0xFFFFFF 
				) 
		));
	}
	/**
	 * Registration user
	 */
	public function actionRegistration() {
		$profile = new User ();
		$model = new RegistrationForm ();
		
		// ajax validator
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'registration-form') {
			echo CActiveForm::validate ( array ($model,$profile), array ('email','username' ) );
			Yii::app ()->end ();
		}
		
		if (Yii::app ()->user->id) {
			$this->redirect ( Yii::app ()->controller->module->profileUrl );
		} else {
			if (isset ( $_POST ['RegistrationForm'] ) && isset ( $_POST ['User'] )) {
				$profile->attributes = $_POST ['User'];
				$model->attributes = $_POST ['RegistrationForm'];
				if ($model->validate () && $profile->validate ()) {
					$profile->role = User::ROLE_MEMBER;
					if ($profile->save ()) {
						$model->user_id = $profile->user_id;
						$soucePassword = $model->password;
						$model->password = UserModule::encrypting ( $model->password );
						$model->verifyPassword = UserModule::encrypting ( $model->verifyPassword );
						$model->save ();
						/*
						 * if (Yii::app()->controller->module->sendActivationMail) { $activation_url = $this->createAbsoluteUrl('/user/activation/activation',array("activkey" => $model->activkey, "email" => $model->email)); UserModule::sendMail($model->email,UserModule::t("You registered from {site_name}",array('{site_name}'=>Yii::app()->name)),UserModule::t("Please activate you account go to {activation_url}",array('{activation_url}'=>$activation_url))); }
						 */
						$identity = new UserIdentity ( $model->username, $soucePassword );
						$identity->authenticate ();
						Yii::app ()->user->login ( $identity, 0 );
						$this->redirect ( Yii::app ()->controller->module->loginUrl );
						/*
						 * if ((Yii::app()->controller->module->loginNotActiv||(Yii::app()->controller->module->activeAfterRegister&&Yii::app()->controller->module->sendActivationMail==false))&&Yii::app()->controller->module->autoLogin) { $identity=new UserIdentity($model->username,$soucePassword); $identity->authenticate(); Yii::app()->user->login($identity,0); $this->redirect(Yii::app()->controller->module->returnUrl); } else { if (!Yii::app()->controller->module->activeAfterRegister&&!Yii::app()->controller->module->sendActivationMail) { Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Contact Admin to activate your account.")); } elseif(Yii::app()->controller->module->activeAfterRegister&&Yii::app()->controller->module->sendActivationMail==false) { Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please {{login}}.",array('{{login}}'=>CHtml::link(UserModule::t('Login'),Yii::app()->controller->module->loginUrl)))); } elseif(Yii::app()->controller->module->loginNotActiv) { Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please check your email or login.")); } else { Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please check your email.")); } $this->refresh(); }
						 */
					}
				} else {
					$profile->validate ();
					$model->validate ();
				}
			}
			$this->render ( '/user/registration', array (
					'login' => $model,
					'model' => $profile 
			) );
		}
	}
}