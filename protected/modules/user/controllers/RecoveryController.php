<?php

class RecoveryController extends Controller
{
	public $defaultAction = 'recovery';
	
	/**
	 * Recovery password
	 */
	public function actionRecovery () {
		$form = new UserRecoveryForm;
		if (Yii::app()->user->id) {
		    	$this->redirect(Yii::app()->controller->module->returnUrl);
		    } else {
				$email = ((isset($_GET['email']))?$_GET['email']:'');
				$activkey = ((isset($_GET['activkey']))?$_GET['activkey']:'');
				if ($email&&$activkey) {
					$form2 = new UserChangePassword;
		    		$find = User::model()->notsafe()->findByAttributes(array('email'=>$email));
		    		$login = UserLogin::model()->notsafe()->findByAttributes(array('password_key'=>$activkey));
		    		if(isset($find)&&isset($login)&&$find->user_id==$login->user_id) {
			    		if(isset($_POST['UserChangePassword'])) {
							$form2->attributes=$_POST['UserChangePassword'];
							if($form2->validate()) {
								$login->password = Yii::app()->controller->module->encrypting($form2->password);
								$login->activkey=null;
								$login->save();
								Yii::app()->user->setFlash('recoveryMessage',UserModule::t("New password is saved."));
								$this->redirect(Yii::app()->controller->module->recoveryUrl);
							}
						} 
						$this->render('changepassword',array('form'=>$form2));
		    		} else {
		    			Yii::app()->user->setFlash('recoveryMessage',UserModule::t("Incorrect recovery link."));
						$this->redirect(Yii::app()->controller->module->recoveryUrl);
		    		}
		    	} else {
			    	if(isset($_POST['UserRecoveryForm'])) {
			    		$form->attributes=$_POST['UserRecoveryForm'];
			    		if($form->validate()) {
			    			$user = UserLogin::model()->notsafe()->findbyPk($form->user_id);
			    			$user->password_key=UserModule::encrypting(microtime().$user->username);
			    			$user->save();
							$activation_url = 'http://' . $_SERVER['HTTP_HOST'].$this->createUrl(implode(Yii::app()->controller->module->recoveryUrl),array("activkey" => $user->password_key, "email" => $user->user->email));
							
							$subject = UserModule::t("You have requested the password recovery site {site_name}",
			    					array(
			    						'{site_name}'=>Yii::app()->name,
			    					));
			    			$message = UserModule::t("You have requested the password recovery site {site_name}. To receive a new password, go to {activation_url}.",
			    					array(
			    						'{site_name}'=>Yii::app()->name,
			    						'{activation_url}'=>$activation_url,
			    					));
							
			    			UserModule::sendMail($user->user->email,$subject,$message);
			    			
							Yii::app()->user->setFlash('recoveryMessage',UserModule::t("Please check your email. An instructions was sent to your email address."));
			    			$this->refresh();
			    		}
			    	}
		    		$this->render('recovery',array('form'=>$form));
		    	}
		    }
	}

}