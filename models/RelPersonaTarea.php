<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_persona_tarea".
 *
 * @property integer $id
 * @property integer $id_persona
 * @property integer $id_tarea
 *
 * @property Personas $idPersona
 * @property Tarea $idTarea
 */
class RelPersonaTarea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_persona_tarea';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona', 'id_tarea'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_persona' => 'Id Persona',
            'id_tarea' => 'Id Tarea',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona()
    {
        return $this->hasOne(Personas::className(), ['id' => 'id_persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTarea()
    {
        return $this->hasOne(Tarea::className(), ['id' => 'id_tarea']);
    }

    /**
     * @inheritdoc
     * @return RelPersonaTareaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RelPersonaTareaQuery(get_called_class());
    }
}
