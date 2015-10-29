<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionalidad".
 *
 * @property integer $id
 * @property integer $id_mother
 * @property integer $id_puerto
 * @property string $descripcion
 *
 * @property Mother $idMother
 * @property Puertos $idPuerto
 */
class Funcionalidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'funcionalidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mother', 'id_puerto'], 'required'],
            [['id_mother', 'id_puerto'], 'integer'],
            [['descripcion'], 'string', 'max' => 45]
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
            'id_puerto' => 'Id Puerto',
            'descripcion' => 'Descripcion',
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
     * @return \yii\db\ActiveQuery
     */
    public function getIdPuerto()
    {
        return $this->hasOne(Puertos::className(), ['id' => 'id_puerto']);
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
