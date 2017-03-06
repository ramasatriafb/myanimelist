<?php

namespace frontend\controllers;

use Yii;
use common\models\datamaster\Review;
use common\models\datamaster\Anime;
use common\models\datamaster\User;
use common\models\datamaster\Komentar;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\filters\AccessControl;
/**
 * ReviewController implements the CRUD actions for Review model.
 */
class ReviewController extends Controller
{
    public function behaviors()
    {
         return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','read'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'myreview','read','all','create','update','userreview'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function(){
                            return (Yii::$app->user->identity->ROLE_ID=='2');
                        }
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    return $this->redirect(['site/index']);
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
     * Lists all Review models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Review::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRead($id)
    {
        $komentar = new Komentar();
         if ($komentar->load(Yii::$app->request->post()) ) {
            $komentar->USER_ID = Yii::$app->user->identity->USER_ID;
            $komentar->REVIEW_ID = $id;
            $komentar->DATE = new Expression('NOW()');
            $komentar->save();
            return $this->redirect(['site/index']);
        }else{
        $sql = "SELECT review.id 'id', anime.anime_title 'title', anime.anime_pict 'pict',anime.episode 'episode', anime.premired, anime.synopsis 'synopsis', review.review 'review',review.date_review 'date_review', user.user_nama 'user',user.user_id 'user_id',user.user_avatar 'ava',count(komentar.review_id) 'jumlah_komentar' FROM review left join komentar on review.id = komentar.review_id, anime, user where review.user_id = user.user_id and review.anime_id = anime.anime_id and review.id = '$id'";
        $komen = "SELECT komentar.komentar 'komentar', komentar.date 'date',user.user_nama 'user',user.user_id 'user_id',user.user_avatar 'ava' FROM komentar,review,user WHERE komentar.review_id = review.id and komentar.user_id = user.user_id and review.id ='$id'";
        
        return $this->render('read', [
            'review' => Review::findBySql($sql)->all(),
            'anime' => Review::findBySql($sql)->all(),
             'user' => Review::findBySql($sql)->all(),
             'komentar' => $komentar,
             'komen' => Review::findBySql($komen)->all(),
        ]);
        }
    }

     public function actionAll()
    {
        $sql = "SELECT review.id 'id', anime.anime_title 'title',anime.anime_id 'id_anime',anime.anime_pict 'pict',review.review 'review' , review.date_review 'date_review', user.user_nama 'user' from review , anime,user where review.user_id = user.user_id and review.anime_id = anime.anime_id order by id desc";
        
        return $this->render('all', [
            'review' => Review::findBySql($sql)->all(),
            'anime' => Review::findBySql($sql)->all(),
             'user' => Review::findBySql($sql)->all(),
        ]);
    }

     public function actionMyreview()
    {
        $id = YII::$app->user->identity->USER_ID;
        $sql = "SELECT review.id 'id', anime.anime_title 'title', anime.anime_pict 'pict',anime.episode 'episode', anime.premired, anime.synopsis 'synopsis', review.review 'review',review.date_review 'date_review', user.user_id 'user_id',user.user_nama 'user',user.user_avatar 'ava' FROM review, anime, user where review.user_id = user.user_id and review.anime_id = anime.anime_id and review.user_id = '$id'  order by id desc";
        
        return $this->render('myreview', [
            'myreview' => Review::findBySql($sql)->all(),
            'anime' => Review::findBySql($sql)->all(),
             'user' => Review::findBySql($sql)->all(),
        ]);
    }
     public function actionUserreview($id)
    {
        $sql = "SELECT review.id 'id', anime.anime_title 'title', anime.anime_pict 'pict',anime.episode 'episode', anime.premired, anime.synopsis 'synopsis', review.review 'review',review.date_review 'date_review', user.user_id 'user_id',user.user_nama 'user',user.user_avatar 'ava' FROM review, anime, user where review.user_id = user.user_id and review.anime_id = anime.anime_id and review.user_id = '$id'  order by id desc";
        
        return $this->render('myreview', [
            'myreview' => Review::findBySql($sql)->all(),
            'anime' => Review::findBySql($sql)->all(),
             'user' => Review::findBySql($sql)->all(),
        ]);
    }

    /**
     * Displays a single Review model.
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
     * Creates a new Review model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Review();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->USER_ID = Yii::$app->user->identity->USER_ID;
            $model->DATE_REVIEW = new Expression('NOW()');
            $model->save();
            return $this->redirect(['myreview']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Review model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['myreview']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Review model.
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
     * Finds the Review model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Review the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Review::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
