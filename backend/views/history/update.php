<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\history\BalanceHistory */

$this->title = 'Обновление истории зачисления №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Истории зачислений', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Номер истории №'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="balance-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
