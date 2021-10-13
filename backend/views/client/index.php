<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\controllers\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-index">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <!--<p>
        <?/*= Html::a('Добавить нового клиента', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $columns=[
        ['class' => 'yii\grid\SerialColumn'],

        'name',
        'birthday',
        'passport',
        'address',
        'company',

        ['class' => 'yii\grid\ActionColumn'],
    ]

    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="fas fa-globe"></i> Клиенты </h3>',
            'type'=>'default',
            'before'=>Html::a('<i class="fas fa-plus"></i> Добавить нового клиента', ['create'], ['class' => 'btn btn-success']),
        ],
        'toolbar'=>[
            Html::a('<i class="fas fa-redo"></i> Сбросить фильтр', ['index'], ['class' => 'btn btn-info']),
            '{export}',
            '{toggleData}'
        ],

    ]); ?>


</div>
