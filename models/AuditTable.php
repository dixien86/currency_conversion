<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "audit_table".
 *
 * @property integer $event_id
 * @property string $event_datetime
 * @property string $event_type
 * @property integer $user_id
 * @property string $description
 */
class AuditTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'audit_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_datetime'], 'safe'],
            [['event_type', 'user_id', 'description'], 'required'],
            [['user_id'], 'integer'],
            [['event_type', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Event ID',
            'event_datetime' => 'Event Datetime',
            'event_type' => 'Event Type',
            'user_id' => 'User ID',
            'description' => 'Description',
        ];
    }
}
