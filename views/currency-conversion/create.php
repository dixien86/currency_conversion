
<?php
/* @var $this yii\web\View */
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\grid\GridView;
    use yii\widgets\Pjax;
 
?>

<?php
$this->registerJs(
   '$("document").ready(function(){
        $("#new_currency").on("pjax:end", function() {
            $.pjax.reload({container:"#currencies"});  //Reload GridView
        });
    });'
);
?>

<?= Html::a('Convert Currency', ['/currency-conversion/convert-currency'], ['class'=>'btn btn-primary']) ?>
<h1>Currency Conversion</h1>

<div class="row">
    <div class="col-md-12">
         <div class="form-group">
            <?php yii\widgets\Pjax::begin(['id' => 'new_currency']) ?>
            <?php $form = ActiveForm::begin(['enableAjaxValidation' => false,'options'=>['data-pjax'=>true]]); ?>
                <div class="col-xs-3">
                   <?= $form->field($model, 'currency')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-xs-3">
                   <?= $form->field($model, 'currency_code') ?>
                </div>
                <div class="col-xs-3">
                   <?= $form->field($model, 'currency_rate') ?>
                </div>
                <div class="col-xs-1">
                    <div style="margin-top:25px;">
                        <?= Html::submitButton('Submit', ['name' => 'submit', 'value' => 'submit_currency','class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
                <div class="col-xs-1">
                    <div style="margin-top:25px;">
                        <?= Html::beginForm(['/currency-conversion/create'], 'post') ?>
                        <?= Html::submitButton('Reset', ['name' => 'submit', 'value' => 'reset_currency','class' => 'btn btn-primary']) ?>
                        <?= Html::endForm()?>
                    </div>
                </div>
            <?php yii\widgets\Pjax::end() ?>
           </div>
     </div>
</div>
<div class="row">
     <?php Pjax::begin(['id' => 'currencies']) ?>
     <?= GridView::widget([
            'dataProvider' => $itemDataProvider,
            'filterModel' => $searchModel,
            'columns' => [

                ['class' => 'yii\grid\SerialColumn'],
                'currency',
                'currency_code',
                'currency_rate',]
    ]); ?>
    <?php Pjax::end() ?>
</div>


