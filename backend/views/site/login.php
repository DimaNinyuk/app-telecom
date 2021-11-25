<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Авторизация';
?>
<div class="site-login">
    <div class="mt-5 offset-lg-3 col-lg-6">
        <h1>Страница авторизации</h1>

        <p>Пожалуйста, заполните следующие поля для входа:</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>

            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

            <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить') ?>

            <div class="form-group">
                <?= Html::submitButton('Вход', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
