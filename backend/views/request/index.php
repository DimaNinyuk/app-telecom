<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\controllers\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requests-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $columns=[
        ['class' => 'yii\grid\SerialColumn'],

        //'id',
        'email:email',
        'name',
        [
            'attribute'=>'client',
            'value'=>'client.passport',
            'label'=>'Паспортные данные клиента'
        ],
        [
            'attribute'=>'service',
            'value'=>'service.name',
            'label'=>'На услугу'
        ],

        ['class' => 'yii\grid\ActionColumn'],
    ]
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="fas fa-comments"></i> Заявки </h3>',
            'type'=>'default',
            //'before'=>Html::a('<i class="fas fa-plus"></i> Создать заявку', ['create'], ['class' => 'btn btn-success']),
        ],
        'toolbar'=>[
                Html::a('<i class="fas fa-redo"></i> Сбросить фильтр', ['index'], ['class' => 'btn btn-info']),
            '{export}',
            '{toggleData}'
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
