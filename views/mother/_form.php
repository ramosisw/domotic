<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mother */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mother-form">
    <div class="well bs-component">
	    <?php $form = ActiveForm::begin(); ?>
			<fieldset>
				<legend>Fill fields</legend>
		    	<?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

		    	<?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

			    <div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>
			</fieldset>
	    <?php ActiveForm::end(); ?>
	</div>
</div>
