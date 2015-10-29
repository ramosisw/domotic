<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Mother]].
 *
 * @see Mother
 */
class MotherQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Mother[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Mother|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}