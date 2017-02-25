<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CurrencyConversion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="currency-conversion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency_rate')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
