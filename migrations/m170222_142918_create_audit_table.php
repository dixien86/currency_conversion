<?php

use yii\db\Migration;

/**
 * Handles the creation of table `audit`.
 */
class m170222_142918_create_audit_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('audit', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('audit');
    }
}
