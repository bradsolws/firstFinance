<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
?><h2><?php echo UserModule::t('Your profile'); ?></h2>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('name')); ?>
</th>
    <td><?php echo CHtml::encode($model->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('mobile')); ?>
</th>
    <td><?php echo CHtml::encode($model->mobile); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
</th>
    <td><?php echo CHtml::encode($model->email); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('address')); ?>
</th>
    <td><?php echo CHtml::encode($model->address1); ?><br/><?php echo CHtml::encode($model->address2); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('city')); ?>
</th>
    <td><?php echo CHtml::encode($model->city); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('state')); ?>
</th>
    <td><?php echo CHtml::encode($model->state); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('country')); ?>
</th>
    <td><?php echo CHtml::encode($model->country); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('pincode')); ?>
</th>
    <td><?php echo CHtml::encode($model->pincode); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>
</th>
    <td><?php echo CHtml::encode($login->username); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('create_ts')); ?>
</th>
    <td><?php echo date("d.m.Y H:i:s",strtotime($model->create_ts)); ?>
</td>
</tr>
<?php if(isset(Yii::app()->user->lastLoginTime)){?>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('last_login')); ?>
</th>
    <td><?php echo date("d.m.Y H:i:s",strtotime(Yii::app()->user->lastLoginTime)); ?>
</td>
<?php }?>
</tr>
</table>
