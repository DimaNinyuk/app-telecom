<?php

namespace backend\models\request;

/**
 * This is the ActiveQuery class for [[Requests]].
 *
 * @see Requests
 */
class RequestsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Requests[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Requests|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}