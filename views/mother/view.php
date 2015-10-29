<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Mother */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Mothers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('$(document).ready(function(){$(".shor").noUiSlider({start:40,connect:"lower",range:{min:0,max:100}})});');
?>
<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        String.prototype.toHHMMSS = function () {
            var sec_num = parseInt(this, 10); // don't forget the second param
            var hours   = Math.floor(sec_num / 3600);
            var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
            var seconds = sec_num - (hours * 3600) - (minutes * 60);

            if (hours   < 10) {hours   = "0"+hours;}
            if (minutes < 10) {minutes = "0"+minutes;}
            if (seconds < 10) {seconds = "0"+seconds;}
            var time    = hours+':'+minutes+':'+seconds;
            return time;
        }
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
       

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        sec=0;
        setInterval(function(){ 
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'elapsed');
            
            // Set chart options
            var options = {
                'title':'Motion'
            };
            var value = Math.floor((Math.random() * 100) + 1);
            data.addRows(addToMatrix(value,sec));
            sec++;
            if(sec>10) sec = 0;
            //console.log(data);
            chart.draw(data, options);
        }, 500);
        matrix=[];
        for (var i = 10; i > 0; i--) {
            matrix.push(['0', 0]);
        };
        SEC=0;
        function addToMatrix(value,sec){
            //forward Matrix
            for (var i = 0; i < 10; i++) {
                matrix[i] = matrix[i+1];
            };
            matrix[9] = [(SEC+'').toHHMMSS(), value];
            SEC++;
            //console.log(matrix);
            
            return matrix;
        }
      }
    </script>
<div class="mother-view">
    <div class="row">
        <div class="col-sm-5 col-md-4">
            <div class="well bs-component">
                <div class='page-header'>
                    <div class='btn-toolbar pull-right'>
                        <div class='btn-group'>
                        <?php if(!(Yii::$app->user->isGuest)){ ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-sm  btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        <?php } ?>
                        </div>
                    </div>
                    <h1 class=""><?= Html::encode($this->title) ?></h1>
                </div> 
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'nombre',
                        'descripcion',
                    ],
                ]) ?>
            </div>
            <div class="well bs-component">
                <h2 class="text-center">Controls</h2>
                <p> 
                    Date: 
                    <?= date("N - D M j G:i:s T Y") ?>
                </p>
                <form action="">
                    <div class="form-group">
                        <label for="light" class="control-label">Light</label>
                        <div class="togglebutton">
                            <label>
                                Turn on/off Light <input name="light" type="checkbox" checked=""> 
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="light" class="control-label">Speed fan</label>
                        <div class="slider shor"></div>
                    </div>
                </form>
                
            </div>
        </div>
        <div class="col-sm-7 col-md-8 ">
            <div class="well bs-component">
                <h3>Who does what?</h3>
                <?= GridView::widget([
                    'dataProvider' => $orden,
                    'columns' => [
                        'nombre',
                        'tarea',
                    ],
                ]); ?>
            </div>
            <div class="well bs-component">
                <div id="chart_div" style="width:100%;height:500px;"></div>    
            </div>
        </div>
    </div>
</div>
