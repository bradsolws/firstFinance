<?php
/* @var $this UserLoginController */
/* @var $data UserLogin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('password_change')); ?>:</b>
	<?php echo CHtml::encode($data->password_change); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('password_key')); ?>:</b>
	<?php echo CHtml::encode($data->password_key); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('last_login')); ?>:</b>
	<?php echo CHtml::encode($data->last_login); ?>
	<br />


</div>