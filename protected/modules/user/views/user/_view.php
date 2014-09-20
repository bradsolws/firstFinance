<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('mobile')); ?>:</b>
	<?php echo CHtml::encode($data->mobile); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('address1')); ?>:</b>
	<?php echo CHtml::encode($data->address1); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('address2')); ?>:</b>
	<?php echo CHtml::encode($data->address2); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<?php 
/*
	       * <b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b> <?php echo CHtml::encode($data->state); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b> <?php echo CHtml::encode($data->country); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('pincode')); ?>:</b> <?php echo CHtml::encode($data->pincode); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('create_ts')); ?>:</b> <?php echo CHtml::encode($data->create_ts); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('update_ts')); ?>:</b> <?php echo CHtml::encode($data->update_ts); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b> <?php echo CHtml::encode($data->updated_by); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b> <?php echo CHtml::encode($data->role); ?> <br />
	       */
	?>

</div>