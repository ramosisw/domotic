<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mother".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 *
 * @property Data[] $datas
 * @property Funcionalidad[] $funcionalidads
 */
class Mother extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mother';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 200],
            [['nombre'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatas()
    {
        return $this->hasMany(Data::className(), ['id_mother' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionalidads()
    {
        return $this->hasMany(Funcionalidad::className(), ['id_mother' => 'id']);
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
