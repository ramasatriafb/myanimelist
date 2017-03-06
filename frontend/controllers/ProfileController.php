<?php

namespace frontend\controllers;

use Yii;
use common\models\datamaster\User;
use common\models\datamaster\Member;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * ProfileController implements the CRUD actions for User model.
 */
class ProfileController extends Controller
{
    public function behaviors()
    {
       return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','update'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function(){
                            return (Yii::$app->user->identity->ROLE_ID=='2');
                        }
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    return $this->redirect(['index']);
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                //'actions' => [
                //    'logout' => ['get'],
                //],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id = Yii::$app->user->identity->USER_ID;   
        if(Yii::$app->user->identity->ROLE_ID=='1'){
        $sql = "SELECT  user.user_id 'id',user.user_nama 'user_nama',user.user_email 'user_email', user.user_avatar 'ava',admin.nama 'nama',admin.date_join 'join'  FROM user ,admin where user.user_id = '$id' and user.user_id = admin.user_id ";
        }else{
         $sql = "SELECT  user.user_id 'id',user.user_nama 'user_nama',user.user_email 'user_email', user.user_avatar 'ava',member.member_nama 'nama', member.date_join 'join' FROM user ,member where user.user_id = '$id' and user.user_id = member.user_id ";
        }
        // $dataProvider = new ActiveDataProvider([
        //     'query' => User::find(),
        // ]);

        return $this->render('index', [
            'profil' => User::findBySql($sql)->all(),
           // 'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            $model->FILE_FILE = UploadedFile::getInstance($model, 'FILE_FILE');
            $namafile = $model->upload();
            //echo $namafile;
            $model->USER_AVATAR = $namafile;
            $model->save();
            return $this->redirect(['index']);
        } else {
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
       
         if ($model->load(Yii::$app->request->post())) {
            $model->FILE_FILE = UploadedFile::getInstance($model, 'FILE_FILE');
            $namafile = $model->upload();
            //echo $namafile;
            $model->USER_AVATAR = $namafile;
            $model->save();
            
       
            return $this->redirect(['index']);
        } else {
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
