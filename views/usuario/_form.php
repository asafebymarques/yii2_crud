<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Ativo;
use app\models\Nivel;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'password')->textInput()?>

    <?= $form->field($model, 'data_criacao')->textInput(['readonly'=> true]) ?>

    <?= $form->field($model, 'data_alteracao')->textInput(['readonly'=> true]) ?>

    <?= $form->field($model, 'fk_nivel')->dropDownList(ArrayHelper::map(Nivel::find()->all(), 'id_nivel' , 'descricao'), ['prompt' => 'Selecione um nivel' ]) ?>

    <?= $form->field($model, 'fk_ativo')->dropDownList(ArrayHelper::map(Ativo::find()->all(), 'id_ativo','descricao'), ['prompt' => 'Selecione um status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
