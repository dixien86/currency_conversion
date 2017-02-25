<?php

namespace app\controllers;
use app\models\CurrencyConversionSearch;
use Yii;
use yii\web\Controller;
use app\models\CurrencyConversion;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

class CurrencyConversionController extends \yii\web\Controller
{ 

    public function actionCreate(){

        $model = new CurrencyConversion();

        If (Yii::$app->request->isPost) {
            if(Yii::$app->request->post('submit') == 'submit_currency'){
                if ($model->load(Yii::$app->request->post()) && $model->save())
                {
                    $this->actionLogTransactions("CREATE","NEW CURRENCY ADDED");
                }
            }elseif(Yii::$app->request->post('submit') == 'reset_currency'){
                CurrencyConversion::deleteAll();
                $this->actionLogTransactions("DELETE","ALL CURRENCIES DELETED");
            }
            $model = new CurrencyConversion(); //reset model
        }

        $searchModel = new CurrencyConversionSearch();
        $itemDataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('create', [
            'model' => $model,
            'searchModel' => $searchModel,
            'itemDataProvider' => $itemDataProvider
        ]);
    }

    public function actionConvertCurrency(){

        $model = new CurrencyConversion();
        $items = ArrayHelper::map(CurrencyConversion::find()->all(), 'id', 'currency');
       
        return $this->render('convert-currency-screen', [
            'model' => $model,
            'items' => $items,
        ]);
    }

    public function actionCalculateCurrency(){

        if (Yii::$app->request->isAjax){
            $data = Yii::$app->request->post();
            $rate = CurrencyConversion::findOne(['id' => $data['curency_to']]);
            $amount = $rate['currency_rate'] * $data['conversion-amount'];
             \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return [
                    'amount' => $amount,
                    'rate' => $rate['currency_rate'] ,

                ];
        }
    }

    public function actionLogTransactions($type,$description){
        $audit = new \app\models\AuditTable();
        $audit->event_type =$type;
        $audit->user_id = Yii::$app->user->identity->id;
        $audit->description = $description;
        $audit->save();
    }

}
