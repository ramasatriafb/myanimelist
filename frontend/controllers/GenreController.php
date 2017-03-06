<?php

namespace frontend\controllers;

use Yii;
use common\models\data\MempunyaiGenre;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\datamaster\User;
use common\models\datamaster\Genre;
use common\models\datamaster\Anime;
use yii\filters\AccessControl;

/**
 * GenreController implements the CRUD actions for MempunyaiGenre model.
 */
class GenreController extends Controller
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
                        'actions' => ['logout', 'action', 'adventure', 'comedy', 'drama', 'fantasy', 'mystery', 'horror', 'parody', 'police', 'psychological', 'romance', 'school','scifi','supernatural'],
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
     * Lists all MempunyaiGenre models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => MempunyaiGenre::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
     public function actionAction()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Action' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('action',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionAdventure()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Adventure' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('adventure',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionComedy()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Comedy' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('comedy',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionDrama()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Drama' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('drama',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionFantasy()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Fantasy' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('fantasy',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionHorror()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Horror' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('horror',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionMystery()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Mystery' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('mystery',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionParody()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Parody' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('parody',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionPolice()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Police' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('police',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionPsychological()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Psychological' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('psychological',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionRomance()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Romance' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('romance',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionSchool()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'School' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('school',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionScifi()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Sci-Fi' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('scifi',  [
                    'anime' =>$data,
                    'top' =>$top,
                ]);
    }
     public function actionSupernatural()
    {
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id and genre.genre = 'Supernatural' group by title order by title asc")->all();
         $top = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' ,genre.genre 'genre' from anime ,genre , mempunyairating, mempunyaigenre where anime.anime_id = mempunyairating.anime_id and anime.anime_id = mempunyaigenre.anime_id and mempunyaigenre.genre_id = genre.genre_id group by title order by rating desc limit 10")->all();
                    return $this->render('supernatural',  [
                    'anime' =>$data,
                    'top' =>$top,
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
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
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
