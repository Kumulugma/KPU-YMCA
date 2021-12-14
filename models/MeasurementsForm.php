<?php
namespace app\models;

use Yii;
use yii\base\Model;

class MeasurementsForm extends Model
{
    public $ID;
    public $gender_ID;
    public $waist;
    public $body_weight;

    public function rules()
    {
        return [
            ['ID', 'safe'],
            [['gender_ID', 'waist', 'body_weight'], 'required', 'message' => 'To pole jest wymagane.'],
            [['waist', 'body_weight'], 'integer', 'min' => 1, 'message' => 'To pole musi zawierać liczbę.'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'gender_ID'                     => 'Płeć',
            'waist'                      => 'Obwód w pasie [cm]',
            'body_weight'                => 'Masa ciała [kg]',
        ];
    }
}