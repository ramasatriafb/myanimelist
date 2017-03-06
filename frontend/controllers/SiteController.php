<?php
namespace frontend\controllers;
use yii\web\NotFoundHttpException;
use Yii;
use common\models\LoginForm;
use common\models\datamaster\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;
use yii\helpers\FileHelper;
use common\models\datamaster\Anime;

use common\models\datamaster\Review;
use yii\data\Pagination;

class SiteController extends Controller
{

    public function behaviors()
    {
		return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                /*'actions' => [
                    'logout' => ['post'],
                ],*/
            ],
        ];
    }

    public function actionIndex()
    {
		$user = new User();
        $anime = new Anime();
        $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' from anime left join mempunyairating on anime.anime_id = mempunyairating.anime_id group by title order by id desc limit 10")->all();

        $review = new Review();
        $data_review = $review->findBySql("SELECT review.id 'id', anime.anime_title 'title',anime.anime_id 'id_anime',anime.anime_pict 'pict',review.review 'review' , review.date_review 'date_review', user.user_nama 'user' ,count(komentar.review_id) 'jumlah_komentar' from review left join komentar on review.id = komentar.review_id, anime,user where review.user_id = user.user_id and review.anime_id = anime.anime_id  group by title order by id desc limit 5");
        $countQuery = clone $data_review;
         $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>5]);
    $models = $data_review->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
        	return $this->render('index',  [
    		'user' => $user,
            'anime' =>$data,
            'review' =>$models,
            'pages' => $pages,
    	]);

    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {

            //echo $namafile;
            $model->USER_PASSWORD = md5(Yii::$app->request->post('pass'));
            $model->ROLE_ID = '2';
            $model->USER_AKTIF = '1';
            $model->save();
            return $this->redirect(['index']);
        } else {

            return $this->render('signup', [
                'model' => $model,
            ]);
        }
    }   
	public function actionError()
	{
		
	}
}
