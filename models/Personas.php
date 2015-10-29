<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property integer $id
 * @property integer $id_mother
 * @property string $nombre
 * @property integer $orden
 *
 * @property Mother $idMother
 * @property RelPersonaTarea[] $relPersonaTareas
 */
class Personas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mother', 'nombre'], 'required'],
            [['id_mother', 'orden'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['orden', 'id_mother'], 'unique', 'targetAttribute' => ['orden', 'id_mother'], 'message' => 'The combination of Id Mother and Orden has already been taken.']
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
            'nombre' => 'Nombre',
            'orden' => 'Orden',
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
    public function getRelPersonaTareas()
    {
        return $this->hasMany(RelPersonaTarea::className(), ['id_persona' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PersonasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonasQuery(get_called_class());
    }
}
