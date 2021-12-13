<?php

namespace app\models;
use app\models\GendersModel;

class MeasurementModel extends \yii\db\ActiveRecord
{
    const FACTOR_1 = '1.634';
    const FACTOR_2 = '0.1804';
    const FACTOR_3 = '2.2';
    const FACTOR_4 = '100';
    const DIFFERENCE_MAN = '98.42';
    const DIFFERENCE_WOMAN = '76.76';
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'measurement';
    }

    public static function primaryKey()
    {
        return ['ID'];
    }

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
       
    public static function getMeasurements()
    {
        return self::find()->all();
    }
    
    public static function doMath(MeasurementModel $model)
    {
        $result = 0;
        if($model->gender_ID == 2)
        {
            $result = (((self::FACTOR_1 * $model->waist) - (self::FACTOR_2 * $model->body_weight) - self::DIFFERENCE_WOMAN) / ( self::FACTOR_3 * $model->body_weight) * 100);
        } else {
            $result = (((self::FACTOR_1 * $model->waist) - (self::FACTOR_2 * $model->body_weight) - self::DIFFERENCE_MAN) / (self::FACTOR_3 * $model->body_weight) * 100);
        }
        
        return $result;
    }
    
    public function getGenders()
    {
        return $this->hasOne(GendersModel::class, ['ID' => 'gender_ID']);
    }
    
}