<?php

namespace backend\models\requeststatus;

use Yii;
use backend\models\request\Requests;
use backend\models\status\Status;
use common\models\User;

/**
 * This is the model class for table "request_status".
 *
 * @property int $id
 * @property string $date
 * @property int $status_id
 * @property int $request_id
 * @property int $user_id
 *
 * @property Requests $request
 * @property Status $status
 * @property User $user
 */
class RequestStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'status_id', 'request_id', 'user_id'], 'required'],
            [['date'], 'safe'],
            [['status_id', 'request_id', 'user_id'], 'integer'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Requests::className(), 'targetAttribute' => ['request_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'status_id' => 'Статус',
            'request_id' => 'Заявка',
            'user_id' => 'Пользователь',
        ];
    }

    /**
     * Gets query for [[Request]].
     *
     * @return \yii\db\ActiveQuery|RequestsQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Requests::className(), ['id' => 'request_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery|StatusQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return RequestStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestStatusQuery(get_called_class());
    }
}
