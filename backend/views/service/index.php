<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\controllers\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $columns=[
        ['class' => 'yii\grid\SerialColumn'],

        //'id',
        'name',
        'description',
        'price',

        ['class' => 'yii\grid\ActionColumn'],
    ]
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="fas fa-globe"></i> Услуги </h3>',
            'type'=>'default',
            'before'=>Html::a('<i class="fas fa-plus"></i> Добавить услугу', ['create'], ['class' => 'btn btn-success']),
        ],
        'toolbar'=>[
                Html::a('<i class="fas fa-redo"></i> Сбросить фильтр', ['index'], ['class' => 'btn btn-info']),
            '{export}',
            '{toggleData}'
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
