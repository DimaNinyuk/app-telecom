<?php

namespace backend\models\operation;

/**
 * This is the ActiveQuery class for [[OperationTypes]].
 *
 * @see OperationTypes
 */
class OperationTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return OperationTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OperationTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
