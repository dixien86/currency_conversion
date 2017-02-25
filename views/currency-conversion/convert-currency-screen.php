<?php
    use yii\helpers\Html;
?>

<?= Html::a('Currency Management', ['/currency-conversion/create'], ['class'=>'btn btn-primary']) ?>

<h1><?= Html::encode("Convert Currency") ?></h1>

<?= $this->render('_search', ['model' => $model, 'items' => $items,]) ?>

