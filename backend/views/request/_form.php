<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\request\Requests */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requests-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client_id')->dropDownList(
        ArrayHelper::map(\backend\models\client\Clients::find()->all(), 'id', 'passport'),
        ['prompt' => '']
    )->label('Клиент') ?>

    <?= $form->field($model, 'service_id')->dropDownList(
        ArrayHelper::map(\backend\models\service\Services::find()->all(), 'id', 'name'),
        ['prompt' => '']
    )->label('Услуга') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
