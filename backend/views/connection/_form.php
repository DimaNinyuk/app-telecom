<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\connection\Connections */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="connections-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'register_date')->textInput() ?>

    <?= $form->field($model, 'personal_account')->textInput() ?>

    <?= $form->field($model, 'current_balance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client_id')->dropDownList(
        ArrayHelper::map(\backend\models\client\Clients::find()->all(), 'id', 'name'),
        ['prompt' => '']
    )->label('Клиент') ?>

    <?= $form->field($model, 'tarif_id')->dropDownList(
        ArrayHelper::map(\backend\models\tarif\Tarifs::find()->all(), 'id', 'name'),
        ['prompt' => '']
    )->label('Тариф') ?>

    <?= $form->field($model, 'connection_status_id')->dropDownList(
        ArrayHelper::map(\backend\models\connectionstatus\ConnectionStatus::find()->all(), 'id', 'name'),
        ['prompt' => '']
    )->label('Статус') ?>

    <?= $form->field($model, 'connection_type_id')->dropDownList(
        ArrayHelper::map(\backend\models\connectiontype\ConnectionTypes::find()->all(), 'id', 'name'),
        ['prompt' => '']
    )->label('Тип подключения') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
