<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Mother;

/* @var $this yii\web\View */
/* @var $model app\models\Tarea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarea-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'id_mother')->dropDownList(ArrayHelper::map(Mother::find()->all(), 'id', 'nombre'))->label('Mother') ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
