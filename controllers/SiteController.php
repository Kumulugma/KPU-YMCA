<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\MeasurementForm;
use app\models\MeasurementModel;
use yii\helpers\Html;
use app\models\GendersModel;
use yii\helpers\ArrayHelper;

class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
    public function actions() {
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
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionStatic() {
        if (Yii::$app->request->post()) {
            $input = Yii::createObject(MeasurementForm::className());
            $input->load(Yii::$app->request->post(), 'MeasurementForm');
            if ($input->validate()) {
                $model = new MeasurementModel();
                $model->gender_ID = $input->gender_ID;
                $model->waist = $input->waist;
                $model->body_weight = $input->body_weight;
                $model->save();
            } else {
                $errors = $input->errors;
                print_r($errors);
            }
        }

        return $this->render('static', [
                    'title' => Html::encode('Kalkulator statyczny'),
                    'data' => new MeasurementForm(),
                    'genders' => ArrayHelper::map(GendersModel::getGenders(), 'ID', 'name'),
                    'model' => MeasurementModel::getMeasurements()
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAjax() {
        return $this->render('ajax');
    }

}
