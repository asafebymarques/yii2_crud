<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ativo */

$this->title = 'Update Ativo: ' . $model->id_ativo;
$this->params['breadcrumbs'][] = ['label' => 'Ativos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ativo, 'url' => ['view', 'id' => $model->id_ativo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ativo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
