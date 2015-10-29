<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "puertos".
 *
 * @property integer $id
 * @property integer $tipo
 * @property string $nombre
 * @property string $ubicacion
 *
 * @property Funcionalidad[] $funcionalidads
 */
class Puertos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'puertos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo', 'nombre'], 'required'],
            [['tipo'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['ubicacion'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'nombre' => 'Nombre',
            'ubicacion' => 'Ubicacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionalidads()
    {
        return $this->hasMany(Funcionalidad::className(), ['id_puerto' => 'id']);
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
