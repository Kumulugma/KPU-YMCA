<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\MeasurementsForm;
use app\models\MeasurementsModel;
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

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionStatic() {
        return $this->render('static', [
                    'title' => Html::encode('Kalkulator'),
                    'data' => new MeasurementsForm(),
                    'genders' => ArrayHelper::map(GendersModel::getGenders(), 'ID', 'name'),
                    'model' => MeasurementsModel::getMeasurements()
        ]);
    }

    public function actionEdit($id) {
        $measurement = MeasurementsModel::getMeasurement($id);
        $data = new MeasurementsForm();
        $data->ID = $measurement->ID;
        $data->gender_ID = $measurement->gender_ID;
        $data->waist = $measurement->waist;
        $data->body_weight = $measurement->body_weight;

        return $this->render('edit', [
                    'title' => Html::encode('Edycja wpisu'),
                    'data' => $data,
                    'genders' => ArrayHelper::map(GendersModel::getGenders(), 'ID', 'name'),
                    'model' => MeasurementsModel::getMeasurements(),
                    'meas'
        ]);
    }

    public function actionSave() {
        if (Yii::$app->request->post()) {
            $input = Yii::createObject(MeasurementsForm::className());
            $input->load(Yii::$app->request->post(), 'MeasurementsForm');
            if ($input->validate()) {
                if (!empty($input->ID)) {
                    $model = MeasurementsModel::getMeasurement($input->ID);
                } else {
                    $model = new MeasurementsModel();
                }
                $model->gender_ID = $input->gender_ID;
                $model->waist = $input->waist;
                $model->body_weight = $input->body_weight;

                $model->save();
            } else {
                $errors = $input->errors;
                print_r($errors);
            }

            return $this->redirect(['site/static']);
        }
    }

}
