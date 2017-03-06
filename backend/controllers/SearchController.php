<?php

namespace backend\controllers;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\models\datamaster\Anime;
use common\models\datamaster\Member;



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

			$anime = Anime::find()->where(['LIKE', 'ANIME_TITLE', $id])->all();
			$member = Member::find()->where(['LIKE', 'MEMBER_NAMA', $id])->all();
			$this->view->params['menu'] = 'dasbor';
			return $this->render('index',[
				'anime' => $anime,
				'member' => $member,
			]);
        }else{
			throw new NotFoundHttpException('Anime Not Found!');
		}
       
    }
}
