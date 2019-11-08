<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guruh".
 *
 * @property int $id
 * @property string $name
 *
 * @property Dars[] $dars
 */
class Guruh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guruh';
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
            'name' => 'Guruh',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDars()
    {
        return $this->hasMany(Dars::className(), ['guruh_id' => 'id']);
    }
}
