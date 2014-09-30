<div class="form">

<?php
	
$form = $this->beginWidget ( 'CActiveForm', array (
			'id' => 'user-form',
			'enableClientValidation' => true,
			'enableAjaxValidation' => true,
			'focus' => array (
					$model,
					'name' 
			),

) );
	?>
	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo $form->errorSummary(array($model,$login)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
    <?php echo $form->labelEx($model,'role'); ?>
    <?php $form->radioButtonList($model, 'role', array(User::ROLE_ADMIN=>USER::ADMIN, User::ROLE_MEMBER=>USER::MEMBER)); ?>
    <?php echo $form->error($model,'role'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'address1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'address2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pincode'); ?>
		<?php echo $form->textField($model,'pincode',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'pincode'); ?>
	</div>
	<hr />
	<div class="row">
	<?php echo $form->labelEx($login,'username'); ?>
	<?php echo $form->textField($login,'username'); ?>
	<?php echo $form->error($login,'username'); ?>
	</div>

	<div class="row">
	<?php echo $form->labelEx($login,'password'); ?>
	<?php echo $form->passwordField($login,'password'); ?>
	<?php echo $form->error($login,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 8 characters."); ?>
	</p>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->