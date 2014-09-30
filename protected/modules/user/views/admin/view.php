<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	$model->userLogin->username,
);
?>
<h1><?php echo UserModule::t('View User').' "'.$model->userLogin->username.'"'; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Create User'),array('create')),
			CHtml::link(UserModule::t('Update User'),array('update','id'=>$model->user_id)),
			CHtml::linkButton(UserModule::t('Delete User'),array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
		),
	)); 

$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
				'name',
				array(
						'name' => 'Username',
						'value' => $model->userLogin->username,
				),
				'mobile',
				'email',
				array(
						'name' => 'Address',
						'value' => $model->address1."\n".$model->address2,
				),
				'city',
				'state',
				'country',
				'pincode',
				array(
						'name' => 'Created on',
						'value' => date("d.m.Y H:i:s",strtotime($model->create_ts)),
				),				
				array(
						'name' => 'Updated By',
						'type'=>'raw',
						'value' => $model->updated_by>0?isset($model->updatedBy)?CHtml::link(CHtml::encode($model->updatedBy->name),array("admin/view","id"=>$model->updatedBy->user_id)):$model->updated_by:'Unavailable',
				),
				array(
						'name' => 'Updated on',
						'value' => date("d.m.Y H:i:s",strtotime($model->update_ts)),
				),
				array(
						'name' => 'Role',
						'value' => User::getRole($model->role),
				),
				array(
						'name' => 'Last Visited On',
						'value' => isset($model->userLogin->last_login)?date("d.m.Y H:i:s",strtotime($model->userLogin->last_login)):'Never Logged In',
				),
		),
)); 

?>
