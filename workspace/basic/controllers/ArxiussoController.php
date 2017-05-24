<?php

namespace app\controllers;

use Yii;
use app\models\Arxiusso;
use app\models\ArxiussoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArxiussoController implements the CRUD actions for Arxiusso model.
 */
class ArxiussoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Arxiusso models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $searchModel = new ArxiussoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $provider2 = (new \yii\db\Query())
            ->from('arxius_so')
            ->where(['user_id' => Yii::$app->user->getId()])
            ->indexBy('arxiu_id')
            ->all();
       
        $model = new Arxiusso();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'provider2' => $provider2,
            'model' => $this,
            
            
        ]);
    }
    
    
    // Retorna a la view global sense aplicar cap filtre
    public function actionGlobal()
    {
        
        $searchModel = new ArxiussoSearch();
        $dataProvider = $searchModel->searchGlobal(Yii::$app->request->queryParams);
       
        $model = new Arxiusso();

        return $this->render('global', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this,
            
            
        ]);
    }

    /**
     * Displays a single Arxiusso model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionSons($user_id){
        return $this->render('sons', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Arxiusso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Arxiusso();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->arxiu_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Arxiusso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->arxiu_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Arxiusso model.
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
     * Finds the Arxiusso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Arxiusso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
     
    protected function findModel($id)
    {
        if (($model = Arxiusso::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
