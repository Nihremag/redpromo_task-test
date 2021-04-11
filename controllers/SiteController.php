<?php

namespace app\controllers;

use app\models\Cities;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\News;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $news = News::find()->all();
        $cities = Cities::find()->all();
        return $this->render('index', [
            'news' => $news,
            'cities' => $cities
        ]);
    }

    public function actionRegion($id)
    {
        $city = Cities::findOne($id);

        if ((int)$id === 0 || !$city) {
            return $this->redirect('/');
        }

        $news = News::find()
            ->where(['city_id' => $id])
            ->all();

        $cities = Cities::find()
            ->all();

        return $this->render('region', [
            'news' => $news,
            'cities' => $cities,
            'regionid' => (int)$id,
            'regionname' => $city->name
        ]);
    }

    public function actionDetail($id)
    {
        $news = News::findOne($id);

        if (!$news) {
            return $this->redirect('/');
        }

        $similar = News::find()
            ->where(['similar_id' => $news->similar_id])
            ->andWhere(['<>', 'id', $id])
            ->orderBy(['id' => SORT_DESC])
            ->limit(3)
            ->all();

        return $this->render('detail', [
            'news' => $news,
            'similar' => $similar,
        ]);
    }

    public function actionSearch($querysearch)
    {
        $news = array();
        if ($querysearch !== '') {
            $news = News::find()
                ->where(['LIKE', 'title', $querysearch])
                ->orWhere(['LIKE', 'text', $querysearch])
                ->all();
        }
        return $this->render('search', [
            'news' => $news
        ]);
    }

    public function actionFavourite()
    {
        $news = News::find()->where(['is_favourite' => true])->all();
        return $this->render('favourite', [
            'news' => $news
        ]);
    }
}
