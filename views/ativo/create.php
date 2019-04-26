<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ativo */

$this->title = 'Create Ativo';
$this->params['breadcrumbs'][] = ['label' => 'Ativos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ativo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
