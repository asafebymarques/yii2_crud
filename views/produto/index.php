<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Produto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_produto',
            'produto',
            'descricao:ntext',
            'fkCategoria.categoria',
            'fkSubCategoria.sub_categoria',
            'fkAtivo.descricao',
            //'data_criacao',
            //'data_alteracao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
