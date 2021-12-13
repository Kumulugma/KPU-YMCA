<?php

namespace app\models;
use app\models\MeasurementModel;

class GendersModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genders';
    }

    public static function primaryKey()
    {
        return ['ID'];
    }
    
    public static function getGenders()
    {
        return self::find()->all();
    }

    public function getMeasurements()
    {
        return $this->hasMany(MeasurementModel::class, ['gender_ID' => 'ID'])->limit(1);
    }
}