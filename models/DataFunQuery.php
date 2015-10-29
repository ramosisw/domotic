<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DataFun]].
 *
 * @see DataFun
 */
class DataFunQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return DataFun[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DataFun|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}