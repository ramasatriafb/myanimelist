<?php

namespace backend\controllers;

use Yii;
use common\models\data\MempunyaiGenre;
use backend\models\CariMempunyaiGenre;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;
/**
 * ManajemenController implements the CRUD actions for MempunyaiGenre model.
 */
class ManajemenGenreController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all MempunyaiGenre models.
     * @return mixed
     */
    public function actionIndex()
    {
       
        // $searchModel = new CariMempunyaiGenre();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $sql = "SELECT a.id 'id', anime_title,genre FROM mempunyaigenre a, anime b, genre c where a.anime_id = b.anime_id and a.genre_id = c.genre_id order by id desc ";
        
        $n = count(CariMempunyaiGenre::findBySql($sql)->all());
        
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
            
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MempunyaiGenre model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MempunyaiGenre model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
           $model = new MempunyaiGenre();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $this->view->params['menu'] = 'transaksi';
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MempunyaiGenre model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->view->params['menu'] = 'transaksi';
        $sql = "SELECT a.id 'id', anime_title,genre FROM mempunyaigenre a, anime b, genre c where a.anime_id = b.anime_id and a.genre_id = c.genre_id ";
        
        $n = count(CariMempunyaiGenre::findBySql($sql)->all());
        
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
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing MempunyaiGenre model.
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
     * Finds the MempunyaiGenre model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MempunyaiGenre the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MempunyaiGenre::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
