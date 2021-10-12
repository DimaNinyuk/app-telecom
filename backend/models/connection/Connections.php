<?php

namespace backend\models\connection;

use backend\models\client\Clients;
use backend\models\connectionstatus\ConnectionStatus;
use backend\models\connectiontype\ConnectionTypes;
use backend\models\tarif\Tarifs;
use backend\models\history\BalanceHistory;
use Yii;

/**
 * This is the model class for table "connections".
 *
 * @property int $id
 * @property string $register_date
 * @property int $personal_account
 * @property float|null $current_balance
 * @property int $client_id
 * @property int $tarif_id
 * @property int $connection_status_id
 * @property int $connection_type_id
 *
 * @property BalanceHistory[] $balanceHistories
 * @property Clients $client
 * @property ConnectionStatus $connectionStatus
 * @property ConnectionTypes $connectionType
 * @property Tarifs $tarif
 */
class Connections extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'connections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['register_date', 'personal_account', 'client_id', 'tarif_id', 'connection_status_id', 'connection_type_id'], 'required'],
            [['register_date'], 'safe'],
            [['personal_account', 'client_id', 'tarif_id', 'connection_status_id', 'connection_type_id'], 'integer'],
            [['current_balance'], 'number'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['tarif_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tarifs::className(), 'targetAttribute' => ['tarif_id' => 'id']],
            [['connection_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ConnectionStatus::className(), 'targetAttribute' => ['connection_status_id' => 'id']],
            [['connection_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ConnectionTypes::className(), 'targetAttribute' => ['connection_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'register_date' => 'Дата регистрации',
            'personal_account' => 'Расчётный счёт',
            'current_balance' => 'Текущий баланс',
            'client_id' => 'Клиент',
            'tarif_id' => 'Тариф',
            'connection_status_id' => 'Статус',
            'connection_type_id' => 'Тип подключения',
        ];
    }

    /**
     * Gets query for [[BalanceHistories]].
     *
     * @return \yii\db\ActiveQuery|BalanceHistoryQuery
     */
    public function getBalanceHistories()
    {
        return $this->hasMany(BalanceHistory::className(), ['connection_id' => 'id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery|ClientsQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'client_id']);
    }

    /**
     * Gets query for [[ConnectionStatus]].
     *
     * @return \yii\db\ActiveQuery|ConnectionStatusQuery
     */
    public function getConnectionStatus()
    {
        return $this->hasOne(ConnectionStatus::className(), ['id' => 'connection_status_id']);
    }

    /**
     * Gets query for [[ConnectionType]].
     *
     * @return \yii\db\ActiveQuery|ConnectionTypesQuery
     */
    public function getConnectionType()
    {
        return $this->hasOne(ConnectionTypes::className(), ['id' => 'connection_type_id']);
    }

    /**
     * Gets query for [[Tarif]].
     *
     * @return \yii\db\ActiveQuery|TarifsQuery
     */
    public function getTarif()
    {
        return $this->hasOne(Tarifs::className(), ['id' => 'tarif_id']);
    }

    /**
     * {@inheritdoc}
     * @return ConnectionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConnectionsQuery(get_called_class());
    }
}
