<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mother */

$this->title = 'Create Mother';
$this->params['breadcrumbs'][] = ['label' => 'Mothers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mother-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
