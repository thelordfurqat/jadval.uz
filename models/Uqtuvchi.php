<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uqtuvchi".
 *
 * @property int $id
 * @property string $fio
 * @property string $image
 * @property string $lavozim
 * @property int $kafedra_id
 *
 * @property Kafedra $kafedra
 * @property Dars[] $dars
 * @property Dars $darsqu
 */
class Uqtuvchi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uqtuvchi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'image', 'lavozim', 'kafedra_id'], 'required'],
            [['kafedra_id'], 'integer'],
            [['fio', 'image', 'lavozim'], 'string', 'max' => 100],
            [['kafedra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kafedra::className(), 'targetAttribute' => ['kafedra_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'image' => 'Image',
            'lavozim' => 'Lavozim',
            'kafedra_id' => 'Kafedra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKafedra()
    {
        return $this->hasOne(Kafedra::className(), ['id' => 'kafedra_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDars()
    {
        return $this->hasMany(Dars::className(), ['uqtuvchi_id' => 'id']);
    }
    public function darsqu($id,$kun,$vaqt,$xafta_turi)
    {
        $dars=Dars::find()->where(['uqtuvchi_id' => $id,'kun'=>$kun,'vaqt'=>$vaqt,'xafta_turi'=>$xafta_turi])->one();
//     print_r($dars);
        return $dars;
    }



}
