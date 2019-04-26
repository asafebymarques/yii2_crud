<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Ativo;
use app\models\SubCategoria;
use app\models\Categoria;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'produto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fk_categoria')->dropDownList(ArrayHelper::map(Categoria::find()->all(), 'id_categoria', 'categoria'),['prompt' => 'Selecione uma categoria']) ?>

    <?= $form->field($model, 'fk_sub_categoria')->dropDownList(ArrayHelper::map(SubCategoria::find()->all(), 'id_sub_categoria', 'sub_categoria') ,['prompt' => 'Selecione uma subcategoria']) ?>

    <?= $form->field($model, 'fk_ativo')->dropDownList(ArrayHelper::map(Ativo::find()->all(), 'id_ativo','descricao'),['prompt' => 'Selecione um status']) ?>

    <?= $form->field($model, 'data_criacao')->textInput([ 'id' => 'data_criacao','readonly'=> true]) ?>

    <?= $form->field($model, 'data_alteracao')->widget(\yii\jui\DatePicker::class, [
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
    ]) ?> 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
