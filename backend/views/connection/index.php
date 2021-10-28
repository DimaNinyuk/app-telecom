<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
/* @var $this yii\web\View */
/* @var $searchModel backend\controllers\ConnectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подключения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="connections-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $columns=[
        ['class' => 'yii\grid\SerialColumn'],
        'register_date',
        'personal_account',
        'current_balance',
        [
            'attribute'=>'client',
            'value'=>'client.passport',
            'label'=>'Клиент'
        ],
        [
            'attribute'=>'tarif',
            'value'=>'tarif.name',
            'label'=>'Тариф'
        ],
        [
            'attribute'=>'connection_status',
            'value'=>'connectionStatus.name',
            'label'=>'Статус'
        ],
        [
            'attribute'=>'connection_type',
            'value'=>'connectionType.name',
            'label'=>'Тип подключения'
        ],
        ['class' => 'yii\grid\ActionColumn'],
        [
            'attribute' => 'История',
            'value' => function (\backend\models\connection\Connections $connections) {
                return Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1.125em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M573 241C518 136 411 64 288 64S58 136 3 241a32 32 0 000 30c55 105 162 177 285 177s230-72 285-177a32 32 0 000-30zM288 400a144 144 0 11144-144 144 144 0 01-144 144zm0-240a95 95 0 00-25 4 48 48 0 01-67 67 96 96 0 1092-71z"></path></svg>', Url::to(['/balance-history/index','history_connect_id'=>$connections->id]));
            },
            'format' => 'raw',
            'contentOptions' => ['style'=>['text-align'=>'center']],
        ],
    ]

    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="fas fa-plug"></i> Подключения </h3>',
            'type'=>'default',
            'before'=>Html::a('<i class="fas fa-plus"></i> Создать подключение', ['create'], ['class' => 'btn btn-success']),
        ],
        'toolbar'=>[
             Html::a('<i class="fas fa-redo"></i> Сбросить фильтр', ['index'], ['class' => 'btn btn-info']),
            '{export}',
            '{toggleData}'
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
