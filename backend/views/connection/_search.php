<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\controllers\ConnectionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="connections-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'register_date') ?>

    <?= $form->field($model, 'personal_account') ?>

    <?= $form->field($model, 'current_balance') ?>

    <?= $form->field($model, 'client_id') ?>

    <?php // echo $form->field($model, 'tarif_id') ?>

    <?php // echo $form->field($model, 'connection_status_id') ?>

    <?php // echo $form->field($model, 'connection_type_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
