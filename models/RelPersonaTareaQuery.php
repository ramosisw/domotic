<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RelPersonaTarea]].
 *
 * @see RelPersonaTarea
 */
class RelPersonaTareaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return RelPersonaTarea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RelPersonaTarea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}