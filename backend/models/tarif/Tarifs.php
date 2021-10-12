<?php

namespace backend\models\tarif;

use Yii;
use backend\models\technology\ConnectionTechnologies;
use backend\models\connection\Connections;

/**
 * This is the model class for table "tarifs".
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int|null $duration_days
 * @property int $speed
 * @property int|null $limit
 * @property int $connection_technology_id
 *
 * @property ConnectionTechnologies $connectionTechnology
 * @property Connections[] $connections
 */
class Tarifs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tarifs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'speed', 'connection_technology_id'], 'required'],
            [['price'], 'number'],
            [['duration_days', 'speed', 'limit', 'connection_technology_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['connection_technology_id'], 'exist', 'skipOnError' => true, 'targetClass' => ConnectionTechnologies::className(), 'targetAttribute' => ['connection_technology_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Тариф',
            'price' => 'Стоимость',
            'duration_days' => 'Продолжительность (дни)',
            'speed' => 'Скорость',
            'limit' => 'Лимит',
            'connection_technology_id' => 'Тип подключения',
        ];
    }

    /**
     * Gets query for [[ConnectionTechnology]].
     *
     * @return \yii\db\ActiveQuery|ConnectionTechnologiesQuery
     */
    public function getConnectionTechnology()
    {
        return $this->hasOne(ConnectionTechnologies::className(), ['id' => 'connection_technology_id']);
    }

    /**
     * Gets query for [[Connections]].
     *
     * @return \yii\db\ActiveQuery|ConnectionsQuery
     */
    public function getConnections()
    {
        return $this->hasMany(Connections::className(), ['tarif_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TarifsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TarifsQuery(get_called_class());
    }
}
