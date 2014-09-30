<?php
$this->breadcrumbs=array(
	(UserModule::t('Users'))=>array('admin'),
	$model->userLogin->username=>array('view','id'=>$model->user_id),
	(UserModule::t('Update')),
);
?>

<h1><?php echo  UserModule::t('Update User')." ".$model->user_id; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Create User'),array('create')),
			CHtml::link(UserModule::t('View User'),array('view','id'=>$model->user_id)),
		),
	)); 

	echo $this->renderPartial('_form', array('model'=>$model,'login'=>$model->userLogin)); ?>