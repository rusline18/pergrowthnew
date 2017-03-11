<?php

namespace frontend\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "region".
 *
 * @property string $region_id
 * @property string $country_id
 * @property string $city_id
 * @property string $name
 *
 * @property City[] $cities
 * @property Country $country
 */
class Region extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'city_id'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'country_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'region_id' => 'Region ID',
            'country_id' => 'Country ID',
            'city_id' => 'City ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['region_id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }

    public static function getRegion()
    {
    	$region = self::find()
    		->where(['country_id'=>'3159'])
    		->all();
    		return $region;
    }
}