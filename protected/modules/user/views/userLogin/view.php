<?php
/* @var $this UserLoginController */
/* @var $model UserLogin */

$this->breadcrumbs = array (
		'User Logins' => array (
				'index' 
		),
		$model->user_id 
);

$this->menu = array (
		array (
				'label' => 'List UserLogin',
				'url' => array (
						'index' 
				) 
		),
		array (
				'label' => 'Create UserLogin',
				'url' => array (
						'create' 
				) 
		),
		array (
				'label' => 'Update UserLogin',
				'url' => array (
						'update',
						'id' => $model->user_id 
				) 
		),
		array (
				'label' => 'Delete UserLogin',
				'url' => '#',
				'linkOptions' => array (
						'submit' => array (
								'delete',
								'id' => $model->user_id 
						),
						'confirm' => 'Are you sure you want to delete this item?' 
				) 
		),
		array (
				'label' => 'Manage UserLogin',
				'url' => array (
						'admin' 
				) 
		) 
);
?>

<h1>View UserLogin #<?php echo $model->user_id; ?></h1>

<?php

$this->widget ( 'zii.widgets.CDetailView', array (
		'data' => $model,
		'attributes' => array (
				'user_id',
				'username',
				'password',
				'password_change',
				'password_key',
				'last_login' 
		) 
) );
?>
