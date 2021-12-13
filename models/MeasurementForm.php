<?php
namespace app\models;

use Yii;
use yii\base\Model;

class MeasurementForm extends Model
{
    public $gender_ID;
    public $waist;
    public $body_weight;

    public function rules()
    {
        return [
            [['gender_ID', 'waist', 'body_weight'], 'required'],
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