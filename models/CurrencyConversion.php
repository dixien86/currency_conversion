<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currency_conversion".
 *
 * @property integer $id
 * @property string $currency
 * @property string $currency_code
 * @property string $currency_rate
 */
class CurrencyConversion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency_conversion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency', 'currency_code', 'currency_rate'], 'required'],
            [['currency_rate'], 'number'],
            [['currency', 'currency_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency' => 'Currency',
            'currency_code' => 'Currency Code',
            'currency_rate' => 'Currency Rate',
        ];
    }
}
