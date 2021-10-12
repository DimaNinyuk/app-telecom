<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\history\BalanceHistory */

$this->title = 'Добавление истории';
$this->params['breadcrumbs'][] = ['label' => 'Истории зачислений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
