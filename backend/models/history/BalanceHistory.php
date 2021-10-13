<?php

namespace backend\models\history;

use Yii;
use backend\models\connection\Connections;
use backend\models\operation\OperationTypes;

/**
 * This is the model class for table "balance_history".
 *
 * @property int $id
 * @property float|null $value
 * @property string|null $date
 * @property string|null $comment
 * @property int $connection_id
 * @property int $operation_type_id
 *
 * @property Connections $connection
 * @property OperationTypes $operationType
 */
class BalanceHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'balance_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'number'],
            [['date'], 'safe'],
            [['connection_id', 'operation_type_id'], 'required'],
            [['connection_id', 'operation_type_id'], 'integer'],
            [['comment'], 'string', 'max' => 255],
            [['connection_id'], 'exist', 'skipOnError' => true, 'targetClass' => Connections::className(), 'targetAttribute' => ['connection_id' => 'id']],
            [['operation_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => OperationTypes::className(), 'targetAttribute' => ['operation_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Значение',
            'date' => 'Дата',
            'comment' => 'Комментарий',
            'connection_id' => 'Номер подключения',
            'operation_type_id' => 'Операция',
        ];
    }

    /**
     * Gets query for [[Connection]].
     *
     * @return \yii\db\ActiveQuery|ConnectionsQuery
     */
    public function getConnection()
    {
        return $this->hasOne(Connections::className(), ['id' => 'connection_id']);
    }

    /**
     * Gets query for [[OperationType]].
     *
     * @return \yii\db\ActiveQuery|OperationTypesQuery
     */
    public function getOperationType()
    {
        return $this->hasOne(OperationTypes::className(), ['id' => 'operation_type_id']);
    }

    /**
     * {@inheritdoc}
     * @return BalanceHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BalanceHistoryQuery(get_called_class());
    }
}
