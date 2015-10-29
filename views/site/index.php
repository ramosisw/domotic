<?php

/* @var $this yii\web\View */

$this->title = 'Domotic';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to Domotic!</h1>
    </div>

    <div class="body-content">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="text-center">Devices connected</h2>
        </div>
    </div>
        <div class="row">
            <?php foreach ($model as $key => $mother) { ?>
            <div class="col-lg-4">
                <h2><?= $mother->nombre ?></h2>
                <p><?= $mother->descripcion ?></p>
                <p><a class="btn btn-danger" href="/mother/view/<?= $mother->id ?>"> <span class="glyphicon glyphicon-open-file"></span> Ver Log</a></p>
            </div>    
            <?php } ?>
        </div>

    </div>
</div>
