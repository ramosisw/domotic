<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tarea".
 *
 * @property integer $id
 * @property integer $id_mother
 * @property string $nombre
 *
 * @property RelPersonaTarea[] $relPersonaTareas
 */
class Tarea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tarea';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mother', 'nombre'], 'required'],
            [['id_mother'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['nombre', 'id_mother'], 'unique', 'targetAttribute' => ['nombre', 'id_mother'], 'message' => 'The combination of Id Mother and Nombre has already been taken.']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelPersonaTareas()
    {
        return $this->hasMany(RelPersonaTarea::className(), ['id_tarea' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TareaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TareaQuery(get_called_class());
    }
}
