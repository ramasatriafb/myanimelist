<?php

namespace backend\controllers;

use Yii;
use common\models\data\MempunyaiRating;
use backend\models\CarirMempunyaiRating;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;

/**
 * MempunyaiRatingController implements the CRUD actions for MempunyaiRating model.
 */
class MempunyaiRatingController extends Controller
{
    public function behaviors()
    {
       return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create','update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function(){
                            return (Yii::$app->user->identity->ROLE_ID=='1');
                        }
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    return $this->redirect(Yii::$app->urlManagerFront->createUrl('site'));
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all MempunyaiRating models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new CarirMempunyaiRating();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $sql = "SELECT a.id 'id', anime_title,rating FROM mempunyairating a, anime b, user c where a.anime_id = b.anime_id and a.user_id = c.user_id ";
        
        $n = count(CarirMempunyaiRating::findBySql($sql)->all());
        
        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $n,
            'key' => 'id',
            'sort' => [
                'attributes' => [
                    'anime_title',
                    'genre',
                ],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
         $this->view->params['menu'] = 'transaksi';
        return $this->render('index', [
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MempunyaiRating model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

         $this->view->params['menu'] = 'transaksi';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MempunyaiRating model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MempunyaiRating();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->USER_ID = Yii::$app->user->identity->USER_ID;
            $model->save();
            return $this->redirect(['index']);
        } else {

         $this->view->params['menu'] = 'transaksi';
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MempunyaiRating model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
             $model->USER_ID = Yii::$app->user->identity->USER_ID;
            $model->save();
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {

         $this->view->params['menu'] = 'transaksi';
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MempunyaiRating model.
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
     * Finds the MempunyaiRating model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MempunyaiRating the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MempunyaiRating::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
