<?php

namespace backend\controllers;

use Yii;
use common\models\datamaster\User;
use backend\models\CarirUser;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\base\Security;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
       return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create','update','delete','profile'],
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

     public function actionProfile()
    {
         $id = Yii::$app->user->identity->USER_ID;   
        
        // $dataProvider = new ActiveDataProvider([
        //     'query' => User::find(),
        // ]);
         $this->view->params['menu'] = 'user';
        return $this->render('profil', [
            'model' => $this->findModel($id),
           // 'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarirUser();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->view->params['menu'] = 'user';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->view->params['menu'] = 'user';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        
        $security = new Security();
         if ($model->load(Yii::$app->request->post())) {
            $pass = Yii::$app->request->post('pass');
             $stringHash = '';
            if (!is_null($pass)) {
                $stringHash = $security->generatePasswordHash($pass);
                 $model->USER_PASSWORD = $stringHash;
             
            $model->FILE_FILE = UploadedFile::getInstance($model, 'FILE_FILE');
            $namafile = $model->upload();
            //echo $namafile;
           // $model->USER_PASSWORD = md5(Yii::$app->request->post('pass'));
            $model->USER_AVATAR = $namafile;
            $model->save();
        }
            return $this->redirect(['view', 'id' => $model->USER_ID]);
        } else {
            $this->view->params['menu'] = 'user';
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $security = new Security();
        if ($model->load(Yii::$app->request->post())) {
            $pass = Yii::$app->request->post('pass');
             $stringHash = '';
            if (!is_null($pass)) {
                $stringHash = $security->generatePasswordHash($pass);
                 $model->USER_PASSWORD = $stringHash;
             
            $model->FILE_FILE = UploadedFile::getInstance($model, 'FILE_FILE');
            $namafile = $model->upload();
            //echo $namafile;
           // $model->USER_PASSWORD = md5(Yii::$app->request->post('pass'));
            $model->USER_AVATAR = $namafile;
            $model->save();
        }
            return $this->redirect(['view', 'id' => $model->USER_ID]);
        } else {
            $this->view->params['menu'] = 'user';
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
