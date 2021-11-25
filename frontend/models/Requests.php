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

 **/
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
     * {@inheritdoc}
     * @return RequestsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestsQuery(get_called_class());
    }
}
