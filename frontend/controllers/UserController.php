<?php


namespace frontend\controllers;
use Yii;
use common\models\datamaster\User;
use common\models\datamaster\Member;
use backend\models\CariUser;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\base\Security;

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
                        'actions' => ['create', 'error'],
                        'allow' => true,
                    ],
                   
                ],
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
        $searchModel = new CariUser();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
        $member = new Member();
        $security = new Security();
         if ($model->load(Yii::$app->request->post())&& $member->load(Yii::$app->request->post())) {
             $pass = Yii::$app->request->post('pass');
             $stringHash = '';
            if (!is_null($pass)) {
                $stringHash = $security->generatePasswordHash($pass);
                 $model->USER_PASSWORD = $stringHash;
                $model->ROLE_ID = '2';
                $model->USER_AKTIF = '1';
                $model->save();
                 $member->USER_ID = $model->USER_ID;
                 $member->DATE_JOIN =  new Expression('NOW()');
                 $member->save();
            }
            //echo $namafile;
           
            return $this->redirect(['site/login']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'member' => $member,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->USER_ID]);
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
