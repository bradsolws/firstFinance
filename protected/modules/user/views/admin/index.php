<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Manage'),
);
?>
<h1><?php echo UserModule::t("Manage Users"); ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Create User'),array('create')),
		),
	));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->user_id),array("admin/update","id"=>$data->user_id))',
		),
		array(
			'name' => 'Username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->userLogin->username),array("admin/view","id"=>$data->user_id))',
		),
		array(
			'name'=>'Email',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->email), "mailto:".$data->email)',
		),
		array(
			'name' => 'Created on',
			'value' => 'date("d.m.Y H:i:s",strtotime($data->create_ts))',
		),
		/* array(
			'name' => 'lastvisit',
			'value' => '(($data->lastvisit)?date("d.m.Y H:i:s",$data->lastvisit):UserModule::t("Not visited"))',
		), */
		array(
			'name'=>'Role',
			'value'=>'User::getRole($data->role)',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
