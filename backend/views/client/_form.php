<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\client\Clients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('ФИО') ?>

    <?= $form->field($model, 'birthday')->textInput()->label('Дата рождения') ?>

    <?= $form->field($model, 'passport')->textInput()->label('Паспортные данные') ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('Адрес') ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true])->label('Компания') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
