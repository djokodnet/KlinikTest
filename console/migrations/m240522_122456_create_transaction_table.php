<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaction}}`.
 */
class m240522_122456_create_transaction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('transaction', [
            'id' => $this->primaryKey(),
            'patient_id' => $this->integer()->notNull(),
            'doctor_id' => $this->integer()->notNull(),
            'treatment_id' => $this->integer(),
            'medicine_id' => $this->integer(),
            'amount' => $this->decimal(10, 2)->notNull(),
            'transaction_date' => $this->date()->notNull(),
            'notes' => $this->text(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // Add foreign keys
        $this->addForeignKey(
            'fk-transaction-patient_id',
            'transaction',
            'patient_id',
            'patient',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-transaction-doctor_id',
            'transaction',
            'doctor_id',
            'doctor',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-transaction-treatment_id',
            'transaction',
            'treatment_id',
            'treatment',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-transaction-medicine_id',
            'transaction',
            'medicine_id',
            'medicine',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('transaction');
    }
}
