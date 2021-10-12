<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\history\BalanceHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="balance-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'connection_id')->textInput() ?>

    <?= $form->field($model, 'operation_type_id')->dropDownList(
        ArrayHelper::map(\backend\models\operation\OperationTypes::find()->all(), 'id', 'name'),
        ['prompt' => '']
    )->label('Тип операции') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
