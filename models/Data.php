<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property integer $id
 * @property integer $id_mother
 * @property string $temp
 * @property string $mov
 * @property string $luz
 *
 * @property Mother $idMother
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mother'], 'required'],
            [['id_mother'], 'integer'],
            [['temp', 'mov', 'luz'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_mother' => 'Id Mother',
            'temp' => 'Temp',
            'mov' => 'Mov',
            'luz' => 'Luz',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMother()
    {
        return $this->hasOne(Mother::className(), ['id' => 'id_mother']);
    }

    /**
     * @inheritdoc
     * @return PuertosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PuertosQuery(get_called_class());
    }
}
