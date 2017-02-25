<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
\app\assets\AppAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\CurrencyConversiontSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$this->registerJs(
   '$("document").ready(function(){
       $("#conversion-amount").keyup(function(){
           var valid = true;
           $("select").find("option:selected").each(function() {
                if($(this).val() ===""){
                    valid = false;
                }
            });

            if(valid === true){
                $.ajax({
                url: "calculate-currency",
                type: "POST",
                data: $("form").serialize(),
                success:function(data){
                    $(".effective-rate").html(data.rate);
                    $(".update-rate").html(data.amount);
                }
                });
            }else{
                alert("Please select a currency in each drop down!");
            }
        });
    });'
);
?>

<div class="currency-conversion-search">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php $form = ActiveForm::begin(); ?>
                <div class="col-xs-4">
                    <label for="from-currency" class="control-label">From</label>
                    <?= Html::dropDownList('curency_from',
                        null, $items,
                        ['prompt' => '-Select Currency-', 'class' => 'form-control']) ?>
                </div>
                <div class="col-xs-4">
                    <label for="to-currency" class="control-label">To</label>
                    <?= Html::dropDownList('curency_to', null,
                        $items,
                        ['prompt' => '-Select Currency-', 'class' => 'form-control']) ?>
                </div>
                <div class="col-xs-4">
                    <label for="conversion-amount" class="control-label">Amount</label>
                    <?= Html::input('text', 'conversion-amount', '',
                        ['class' => 'form-control', 'id' => 'conversion-amount']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div><br/>
    <div class="row">
        <div class="col-md-12">
            <p><b>Effective Rate: </b><span class="effective-rate"></span></p>
            <p><b>Converted Amount: </b><span class="update-rate"></span></p>
        </div>
    </div>
</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
<!--<script>
    $("#conversion-amount").keyup(function(){
          $.ajax({
            url: "calculate-currency",
            type: 'POST',
            data: $('form').serialize(),
            success:function(data){
                $(".effective-rate").html(data.rate);
                $(".update-rate").html(data.amount);
            }
        });
    });
</script>-->
