<?php

namespace app\controllers;

use Yii;
use app\models\Mother;
use app\models\Personas;
use app\models\Tarea;
use app\models\Orden;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;

/**
 * MotherController implements the CRUD actions for Mother model.
 */
class MotherController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete',],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => false,
                        'verbs' => ['post'],
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
            
        ];
    }

    /**
     * Lists all Mother models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Mother::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mother model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $orden = $this->getOrders($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'orden' => $orden,
        ]);
    }

    /**
     * Creates a new Mother model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mother();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mother model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mother model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mother model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mother the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mother::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function getOrders($id_mother){
        date_default_timezone_set('America/Monterrey');
        $tareas = Tarea::find()->where(['id_mother'=>$id_mother])->all();
        $personas = Personas::find()->where(['id_mother'=>$id_mother])->orderBy('orden')->all();

        $ini = strtotime('2015-01-01');
        //$fin = strtotime('2015-10-31');
        $fin = strtotime(date('Y')."-".date('m').'-'.date('d'));
        $day = floor( ($fin - $ini) / (60*60*24) );
        //$day = date('Y');
        //$day += date('d');
        //$day += date('m');
        //$day += 11;
        //$day += 1;

        $orden = $day % count($personas);
        for ($i=0; $i < count($tareas); $i++) { 
            $orden = $orden % count($personas) + 1;
            $model[$i] = new Orden();
            //$model[$i]->tarea = $day.' - '.$orden.' - '.$fin;
            $model[$i]->tarea = $tareas[$i]->nombre;
            $model[$i]->nombre = $personas[$orden-1]->nombre;
        }
        $provider = new ArrayDataProvider([
                            'allModels' => $model,
                        ]);
        return $tareas > 0 ? $provider : [];
    }
   
}
