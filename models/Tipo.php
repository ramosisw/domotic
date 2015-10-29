<?php

namespace app\models;

class Tipo extends \yii\base\Object
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $types = [
        '0' => [
            'id'=>'0',
            'name' => 'PWM',
        ],
        '1' => [
            'id'=>'1',
            'name' => 'I/O',
        ],
        '2' => [
            'id'=>'2',
            'name' => 'Data',
        ],
    ];

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getTypes(){
        return self::$types;
    }


    private static function loadItems($type)
    {
        self::$types[$type]=[];
        $models=self::findAll([
            'condition'=>'type=:$type',
            'params'=>[':type'=>$type],
            'order'=>'position',
        ]);

        foreach ($models as $model)
            self::$types[$type][$model->code]=$model->name;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$types[$id]) ? (self::$types[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findNameById($id)
    {
        return isset(self::$types[$id]) ? self::$types[$id]['name'] : null;
    }

    /**
     * @inheritdoc
     */
    public static function findByName($name)
    {
        foreach (self::$types as $type) {
            if (strcasecmp($type['name'], $name) === 0) {
                return new static($type);
            }
        }
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

}
