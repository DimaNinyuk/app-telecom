<?php

namespace backend\models\service;

use Yii;
use backend\models\request\Requests;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property float $price
 *
 * @property Requests[] $requests
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Услуга',
            'description' => 'Описание',
            'price' => 'Стоимость',
        ];
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery|RequestsQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Requests::className(), ['service_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServicesQuery(get_called_class());
    }
}
