<?php

namespace backend\models\connectiontype;

use Yii;
use backend\models\connection\Connections;

/**
 * This is the model class for table "connection_types".
 *
 * @property int $id
 * @property string $name
 *
 * @property Connections[] $connections
 */
class ConnectionTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'connection_types';
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
            'name' => 'Тип подключения',
        ];
    }

    /**
     * Gets query for [[Connections]].
     *
     * @return \yii\db\ActiveQuery|ConnectionsQuery
     */
    public function getConnections()
    {
        return $this->hasMany(Connections::className(), ['connection_type_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ConnectionTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConnectionTypesQuery(get_called_class());
    }
}
