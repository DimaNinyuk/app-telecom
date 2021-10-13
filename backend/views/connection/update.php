<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\connection\Connections */

$this->title = 'Обновление подключения №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Подключения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Номер подключения №'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="connections-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
