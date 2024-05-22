<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%patient}}`.
 */
class m240522_102442_create_patient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
public function safeUp()
{
    $this->createTable('patient', [
        'id' => $this->primaryKey(),
        'name' => $this->string()->notNull(),
        'birthdate' => $this->date(),
        'address' => $this->string(),
        'phone' => $this->string(),
        'email' => $this->string()->unique(),
        'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
    ]);
}

public function safeDown()
{
    $this->dropTable('patient');
}
}
