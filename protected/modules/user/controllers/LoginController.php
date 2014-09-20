<?php
class LoginController extends Controller {
	public $defaultAction = 'login';
	
	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		if (Yii::app ()->user->isGuest) {
			$model = new LoginForm ();
			// collect user input data
			if (isset ( $_POST ['LoginForm'] )) {
				$model->attributes = $_POST ['LoginForm'];
				// validate user input and redirect to previous page if valid
				if ($model->validate ()) {
					$this->lastViset ();
					if (strpos ( Yii::app ()->user->returnUrl, '/index.php' ) !== false)
						$this->redirect ( Yii::app ()->controller->module->returnUrl );
					else
						$this->redirect ( Yii::app ()->user->returnUrl );
				}
			}
			// display the login form
			$this->render ( '/user/login', array (
					'model' => $model 
			) );
		} else
			$this->redirect ( Yii::app ()->controller->module->returnUrl );
	}
	private function lastViset() {
		$lastVisit = UserLogin::model ()->notsafe ()->findByPk ( Yii::app ()->user->id );
		$lastVisit->last_login = date('Y-m-d H:i:s');
		$lastVisit->save ();
	}
}