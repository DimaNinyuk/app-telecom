<?php

namespace backend\models\technology;

use Yii;
use backend\models\tarif\Tarifs;

/**
 * This is the model class for table "connection_technologies".
 *
 * @property int $id
 * @property string $name
 *
 * @property Tarifs[] $tarifs
 */
class ConnectionTechnologies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'connection_technologies';
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
            'name' => 'Технология',
        ];
    }

    /**
     * Gets query for [[Tarifs]].
     *
     * @return \yii\db\ActiveQuery|TarifsQuery
     */
    public function getTarifs()
    {
        return $this->hasMany(Tarifs::className(), ['connection_technology_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ConnectionTechnologiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConnectionTechnologiesQuery(get_called_class());
    }
}
