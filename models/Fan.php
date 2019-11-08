<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fan".
 *
 * @property int $id
 * @property string $name
 * @property integer $maruza
 * @property integer $amaliyot
 * @property integer labaratoriya
 * @property integer $seminar
 * @property integer $mustaqil
 * @property integer $yuklama
 *
 * @property Dars[] $dars
 */
class Fan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['maruza','amaliyot','labaratoriya','seminar','mustaqil','yuklama'],'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Fan',
            'maruza' => 'Ma\'ruza',
            'amaliyot'=> 'Amaliyot',
            'labaratoriya'=>'Labaratoriya',
            'mustaqil'=>'Mustaqil ta\'lim',
            'yuklama'=>'Yuklama'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDars()
    {
        return $this->hasMany(Dars::className(), ['fan_id' => 'id']);
    }
}
