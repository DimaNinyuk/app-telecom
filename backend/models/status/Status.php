<?php

namespace backend\models\status;

use Yii;
use backend\models\requeststatus\RequestStatus;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $name
 *
 * @property RequestStatus[] $requestStatuses
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
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
            'name' => 'Статус',
        ];
    }

    /**
     * Gets query for [[RequestStatuses]].
     *
     * @return \yii\db\ActiveQuery|RequestStatusQuery
     */
    public function getRequestStatuses()
    {
        return $this->hasMany(RequestStatus::className(), ['status_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return StatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StatusQuery(get_called_class());
    }
}
