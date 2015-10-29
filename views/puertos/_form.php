<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tipo;

/* @var $this yii\web\View */
/* @var $model app\models\Puertos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="puertos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::activeDropDownList($model, 'tipo', ArrayHelper::map(Tipo::getTypes(), 'id', 'name'),['class' =>'form-control']) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ubicacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
