<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prescription}}`.
 */
class m240522_111848_create_prescription_table extends Migration
{
    /**
     * {@inheritdoc}
     */
public function safeUp()
{
    $this->createTable('prescription', [
        'id' => $this->primaryKey(),
        'patient_id' => $this->integer()->notNull(),
        'medicine_name' => $this->string()->notNull(),
        'dosage' => $this->string()->notNull(),
        'doctor_id' => $this->integer()->notNull(),
        'date' => $this->dateTime()->notNull(),
        'notes' => $this->text(),
        'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
    ]);

    // Foreign key untuk patient_id
    $this->addForeignKey(
        'fk-prescription-patient_id',
        'prescription',
        'patient_id',
        'patient',
        'id',
        'CASCADE'
    );

    // Foreign key untuk doctor_id
    $this->addForeignKey(
        'fk-prescription-doctor_id',
        'prescription',
        'doctor_id',
        'doctor',
        'id',
        'CASCADE'
    );
}

public function safeDown()
{
    $this->dropTable('prescription');
}
}
