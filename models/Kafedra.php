<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kafedra".
 *
 * @property int $id
 * @property string $name
 *
 * @property Uqtuvchi[] $uqtuvchis
 */
class Kafedra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kafedra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUqtuvchis()
    {
        return $this->hasMany(Uqtuvchi::className(), ['kafedra_id' => 'id']);
    }
}
