<?php

namespace backend\models\operation;

use Yii;
use backend\models\history\BalanceHistory;

/**
 * This is the model class for table "operation_types".
 *
 * @property int $id
 * @property string $name
 *
 * @property BalanceHistory[] $balanceHistories
 */
class OperationTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operation_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Операция',
        ];
    }

    /**
     * Gets query for [[BalanceHistories]].
     *
     * @return \yii\db\ActiveQuery|BalanceHistoryQuery
     */
    public function getBalanceHistories()
    {
        return $this->hasMany(BalanceHistory::className(), ['operation_type_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return OperationTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OperationTypesQuery(get_called_class());
    }
}
