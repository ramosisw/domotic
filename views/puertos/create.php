<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Puertos */

$this->title = 'Create Puertos';
$this->params['breadcrumbs'][] = ['label' => 'Puertos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puertos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
