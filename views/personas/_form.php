<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Mother;
use app\models\Tarea;

/* @var $this yii\web\View */
/* @var $model app\models\personas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'id_mother')->dropDownList(ArrayHelper::map(Mother::find()->all(), 'id', 'nombre'))->label('Mother') ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orden')->textInput() ?>

	<?= $form->field($model, 'relPersonaTareas[]')->checkboxList(ArrayHelper::map(Tarea::find()->all(), 'id','nombre'))->label('Tareas')  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>