<?php

namespace frontend\controllers;

use Yii;
use common\models\datamaster\Anime;

use common\models\datamaster\Genre;
use common\models\datamaster\Review;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'detail'],
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
     * Lists all Anime models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Anime::find(),
        ]);

        return $this->render('index', [
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ANIME_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionDetail($id)
    {
        $sql = "SELECT anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', anime.episode 'episode', anime.premired 'premired', anime.synopsis 'synopsis', round(avg( mempunyairating.rating),2) 'rating', genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and anime.anime_id ='$id'";

        $review = "SELECT review.id 'id', anime.anime_title 'title',anime.anime_pict 'pict',review.review 'review' , review.date_review 'date_review', user.user_nama 'user',user.user_avatar 'ava' from review , anime,user where review.user_id = user.user_id and review.anime_id = anime.anime_id and anime.anime_id = '$id' order by id desc ";

        $genre = "SELECT genre.genre 'genre' from anime,genre,mempunyaigenre where mempunyaigenre.anime_id = anime.anime_id and mempunyaigenre.genre_id = genre.genre_id and anime.anime_id = 4 order by genre asc";
        
        
        return $this->render('detail', [
            'review' => Review::findBySql($review)->all(),
            'anime' => Anime::findBySql($sql)->all(),
            'genre' => Genre::findBySql($genre)->all(),
             'user' => Review::findBySql($sql)->all(),
        ]);
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
