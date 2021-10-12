<?php

namespace backend\models\client;

use backend\models\connection\Connections;
use backend\models\request\Requests;
use Yii;
use yii\db\Connection;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $name
 * @property string|null $birthday
 * @property int $passport
 * @property string $address
 * @property string $company
 *
 * @property Connections[] $connections
 * @property Requests[] $requests
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'passport', 'address', 'company'], 'required'],
            [['birthday'], 'safe'],
            [['passport'], 'integer'],
            [['name', 'address', 'company'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'birthday' => 'Дата рождения',
            'passport' => 'Паспорт',
            'address' => 'Адрес',
            'company' => 'Фирма',
        ];
    }

    /**
     * Gets query for [[Connections]].
     *
     * @return \yii\db\ActiveQuery|ConnectionsQuery
     */
    public function getConnections()
    {
        return $this->hasMany(Connections::className(), ['client_id' => 'id']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery|RequestsQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Requests::className(), ['client_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ClientsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientsQuery(get_called_class());
    }
}
