<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_fun".
 *
 * @property integer $id
 * @property integer $id_funcionalidad
 * @property string $valor_char
 * @property integer $valor_int
 * @property string $valor_double
 *
 * @property Funcionalidad $idFuncionalidad
 */
class DataFun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_fun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_funcionalidad'], 'required'],
            [['id_funcionalidad', 'valor_int'], 'integer'],
            [['valor_double'], 'number'],
            [['valor_char'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_funcionalidad' => 'Id Funcionalidad',
            'valor_char' => 'Valor Char',
            'valor_int' => 'Valor Int',
            'valor_double' => 'Valor Double',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFuncionalidad()
    {
        return $this->hasOne(Funcionalidad::className(), ['id' => 'id_funcionalidad']);
    }

    /**
     * @inheritdoc
     * @return DataFunQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DataFunQuery(get_called_class());
    }
}
