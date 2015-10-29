<?php
/**
 * Created by PhpStorm.
 * User: Abhimanyu
 * Date: 18-02-2015
 * Time: 22:07
 */

namespace app\models;

use yii\base\Model;

class Orden extends Model
{
    public $nombre;
    public $tarea;

    public function rules()
    {
        return [
            // nombre
            [['nombre','tarea'], 'required'],
            [['nombre','tarea'], 'string', 'max' => 45],
        ];
    }

    public function attributeLabels()
    {
        return [
            'nombre'          => 'Nombre',
            'tarea' => 'Tarea',
        ];
    }
}