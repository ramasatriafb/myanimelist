<?php

namespace backend\controllers;

use Yii;
use common\models\datamaster\Anime;
use backend\models\CariAnime;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\db\Expression;

/**
 * AnimeController implements the CRUD actions for Anime model.
 */
class AnimeController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create'],
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
     * Lists all Anime models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CariAnime();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         $this->view->params['menu'] = 'data';
       
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anime model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->view->params['menu'] = 'data';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Anime model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Anime();

        if ($model->load(Yii::$app->request->post())) {
            $model->FILE_FILE = UploadedFile::getInstance($model, 'FILE_FILE');
            $namafile = $model->upload();
            $model->ANIME_PICT = $namafile;
             $model->DATE_CREATE = new Expression('NOW()');
             $model->save();
            return $this->redirect(['index']);
        } else {
           $this->view->params['menu']='data';
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Anime model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ANIME_ID]);
        } else {
            $this->view->params['menu']='data';
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Anime model.
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
     * Finds the Anime model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anime the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anime::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
