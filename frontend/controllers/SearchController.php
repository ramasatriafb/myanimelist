<?php

namespace frontend\controllers;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\models\datamaster\Anime;


class SearchController extends \yii\web\Controller
{
	 public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['get'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
    	if (Yii::$app->request->get()) {
			$id = Yii::$app->getRequest()->getQueryParam('search');

			$anime = new Anime();
			 $data = $anime->findBySql("select anime.anime_title 'title', anime.anime_pict 'pict', anime.anime_id 'id', round(avg( mempunyairating.rating),2) 'rating', count(mempunyairating.rating) 'user' from anime left join mempunyairating on anime.anime_id = mempunyairating.anime_id where anime.anime_title like '$id%' group by title order by id desc limit 10")->all();

			return $this->render('index',[
				'anime' => $data,
			]);
        }else{
			throw new NotFoundHttpException('Anime Not Found!');
		}
       
    }

}
