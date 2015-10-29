<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Mother;
use app\models\Puertos;
use app\models\Funcionalidad;
/* @var $this yii\web\View */
/* @var $model app\models\funcionalidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="funcionalidad-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'id_mother')->dropDownList(ArrayHelper::map(Mother::find()->all(), 'id', 'nombre'))->label('Mother') ?>
    
    <?= $form->field($model, 'id_puerto')->dropDownList(ArrayHelper::map(Puertos::find()->all(), 'id', ['nombre']))->label('Puerto') ?>
   

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
