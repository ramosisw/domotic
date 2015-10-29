<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\funcionalidad */

$this->title = 'Create Funcionalidad';
$this->params['breadcrumbs'][] = ['label' => 'Funcionalidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionalidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
