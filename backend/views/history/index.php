<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\controllers\BalanceHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'История подключения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-history-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $columns=[
        ['class' => 'yii\grid\SerialColumn'],
        'value',
        'date',
        'comment',
        'connection_id',
        [
            'attribute'=>'operation_type',
            'value'=>'operationType.name',
            'label'=>'Тип операции'
        ],

        ['class' => 'yii\grid\ActionColumn'],
    ]
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="fas fa-globe"></i> История </h3>',
            'type'=>'default',
            'before'=>Html::a('<i class="fas fa-plus"></i> Добавить', ['create'], ['class' => 'btn btn-success']),
        ],
        'toolbar'=>[
            Html::a('<i class="fas fa-redo"></i> Сбросить фильтр', ['index'], ['class' => 'btn btn-info']),
            '{export}',
            '{toggleData}'
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
