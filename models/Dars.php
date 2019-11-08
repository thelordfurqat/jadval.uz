<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dars".
 *
 * @property int $id
 * @property int $fan_id
 * @property int $kun
 * @property int $vaqt
 * @property int $guruh_id
 * @property int $xona_id
 * @property int $dars_turi
 *
 * @property Fan $fan
 * @property Guruh $guruh
 * @property Xona $xona
 * @property Uqtuvchi $uqtuvchi
 */
class Dars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fan_id', 'kun', 'vaqt', 'guruh_id', 'xona_id', 'dars_turi','uqtuvchi_id','xafta_turi'], 'required'],
            [['fan_id', 'kun', 'vaqt', 'guruh_id', 'xona_id', 'dars_turi','uqtuvchi_id','xafta_turi'], 'integer'],
            [['fan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fan::className(), 'targetAttribute' => ['fan_id' => 'id']],
            [['guruh_id'], 'exist', 'skipOnError' => true, 'targetClass' => Guruh::className(), 'targetAttribute' => ['guruh_id' => 'id']],
            [['xona_id'], 'exist', 'skipOnError' => true, 'targetClass' => Xona::className(), 'targetAttribute' => ['xona_id' => 'id']],
            [['uqtuvchi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Uqtuvchi::className(), 'targetAttribute' => ['uqtuvchi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fan_id' => 'Fan',
            'uqtuvchi_id'=>'O\'qituvchi',
            'kun' => 'Kun',
            'vaqt' => 'Vaqt',
            'guruh_id' => 'Guruh',
            'xona_id' => 'Xona',
            'dars_turi' => 'Dars Turi',
            'xafta_turi'=>'Xafta turi'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFan()
    {
        return $this->hasOne(Fan::className(), ['id' => 'fan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuruh()
    {
        return $this->hasOne(Guruh::className(), ['id' => 'guruh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getXona()
    {
        return $this->hasOne(Xona::className(), ['id' => 'xona_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUqtuvchi()
    {
        return $this->hasOne(Uqtuvchi::className(), ['id' => 'uqtuvchi_id']);
    }


    public function getVaqtqu(){
        switch ('vaqt'){
            case '1':return '08:30';break;
            case '2':return '10:00';break;
            case '3':return '11:30';break;
            case '4':return '13:30';break;
            case '5':return '15:00';break;
            case '6':return '16:30';break;
            default: return 'XX:XX';
        }
    }public function getKunqu(){
        switch ('kun'){
            case 1:return 'Dushanba';break;
            case 2:return 'Seshanba';break;
            case 3:return 'Chorshanba';break;
            case 4:return 'Payshanba';break;
            case 5:return 'Juma';break;
            case 6:return 'Shanba';break;
            default: return 'XX:XX';
        }
    }
    public function getXafta_turiqu(){
        switch ('xafta_turi'){
            case '1':return 'Umumiy';break;
            case '2':return 'Juft';break;
            case '3':return 'Top';break;
            default:return 'Umumiy';break;
        }
    }
    public function dars_turiqu($dars_turi){
        switch ($dars_turi){
            case '1':return 'Ma\'ruza';break;
            case '2':return 'Seminar';break;
            case '3':return 'Amaliyot';break;
            case '4':return 'Tajriba';break;
            default:return 'Umumiy';break;
        }
    }
}
