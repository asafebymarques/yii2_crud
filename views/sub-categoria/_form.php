<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Ativo;
use app\models\Categoria;

/* @var $this yii\web\View */
/* @var $model app\models\SubCategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sub-categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sub_categoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fk_sub_categoria')->dropDownList(ArrayHelper::map(Categoria::find()->all(), 'id_categoria' , 'categoria'), ['prompt' => 'Selecione uma categoria']) ?>

    <?= $form->field($model, 'fk_ativo')->dropDownList(ArrayHelper::map(Ativo::find()->all(), 'id_ativo','descricao'), ['prompt' => 'Selecione um status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
