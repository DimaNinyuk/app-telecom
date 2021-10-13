<?php

namespace backend\models\connectionstatus;

/**
 * This is the ActiveQuery class for [[ConnectionStatus]].
 *
 * @see ConnectionStatus
 */
class ConnectionStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ConnectionStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ConnectionStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
