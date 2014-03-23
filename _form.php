<?php
/* @var $this SiswaController */
/* @var $model Siswa */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'siswa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NIK'); ?>
		<?php echo $form->textField($model,'NIK',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'NIK'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_siswa'); ?>
		<?php echo $form->textField($model,'nama_siswa',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nama_siswa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textField($model,'alamat',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sekolah'); ?>
		<?php echo $form->textField($model,'sekolah',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'sekolah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kelas'); ?>
		<?php echo $form->textField($model,'kelas',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'kelas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mata_pelajaran'); ?> 
		<?php echo $form->dropDownList($model, 'mata_pelajaran', CHtml::listData(MataPelajaran::model()->findAll(),'mata_pelajaran','mata_pelajaran'), array('empty' => 'Pilih mata pelajaran...')); ?>
		<?php echo $form->error($model,'mata_pelajaran'); ?>
	</div>

	<div class="row">

	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
		array(
		'name'=>'Siswa[awal_masuk]',
		'value'=>$model->awal_masuk,
		'options'=>array(
		'showAnim'=>'fold',
		'dateFormat'=>'yy-mm-dd',
				),
			));
		?>
	<?php echo $form->labelEx($model,'awal_masuk'); ?>
</div>


	<div class="row">
		<?php echo $form->labelEx($model,'nilai_tes'); ?>
		<?php echo $form->textField($model,'nilai_tes'); ?>
		<?php echo $form->error($model,'nilai_tes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level_sekarang'); ?>
	<?php echo $form->dropDownList($model, 'level_sekarang', CHtml::listData(Level::model()->findAll(),'level','level'), array('empty' => 'Pilih Level...')); ?>
		<?php echo $form->error($model,'level_sekarang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level_penempatan'); ?>
		<?php echo $form->textField($model,'level_penempatan',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'level_penempatan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
