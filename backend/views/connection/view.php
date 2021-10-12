<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\connection\Connections */

$this->title = 'Номер подключения №'. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Подключения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="connections-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'register_date',
            'personal_account',
            'current_balance',
            [
                'value'=>$model->client->name,
                'label'=>'Клиент'
            ],
            [
                'value'=>$model->tarif->name,
                'label'=>'Тариф'
            ],
            [
                'value'=>$model->connectionStatus->name,
                'label'=>'Статус'
            ],
            [
                'value'=>$model->connectionType->name,
                'label'=>'Тип подключения'
            ],
        ],
    ]) ?>

</div>
