<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property int|null $client_id
 * @property int|null $service_id
 *
 * @property Clients $client
 * @property RequestStatus[] $requestStatuses
 * @property Services $service
 */
class Requests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name'], 'required'],
            [['client_id', 'service_id'], 'integer'],
            [['email', 'name'], 'string', 'max' => 100],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Name',
            'client_id' => 'Client ID',
            'service_id' => 'Service ID',
        ];
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
     * Gets query for [[RequestStatuses]].
     *
     * @return \yii\db\ActiveQuery|RequestStatusQuery
     */
    public function getRequestStatuses()
    {
        return $this->hasMany(RequestStatus::className(), ['request_id' => 'id']);
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery|ServicesQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }

    /**
     * {@inheritdoc}
     * @return RequestsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestsQuery(get_called_class());
    }
}
