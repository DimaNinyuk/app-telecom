<?php

namespace backend\models\connectionstatus;

use Yii;
use backend\models\connection\Connections;

/**
 * This is the model class for table "connection_status".
 *
 * @property int $id
 * @property string $name
 *
 * @property Connections[] $connections
 */
class ConnectionStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'connection_status';
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
            'name' => 'Статус подключения',
        ];
    }

    /**
     * Gets query for [[Connections]].
     *
     * @return \yii\db\ActiveQuery|ConnectionsQuery
     */
    public function getConnections()
    {
        return $this->hasMany(Connections::className(), ['connection_status_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ConnectionStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConnectionStatusQuery(get_called_class());
    }
}
