<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%treatment}}`.
 */
class m240522_111835_create_treatment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
public function safeUp()
{
    $this->createTable('treatment', [
        'id' => $this->primaryKey(),
        'patient_id' => $this->integer()->notNull(),
        'treatment_name' => $this->string()->notNull(),
        'doctor_id' => $this->integer()->notNull(),
        'date' => $this->dateTime()->notNull(),
        'notes' => $this->text(),
        'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
    ]);

    // Foreign key untuk patient_id
    $this->addForeignKey(
        'fk-treatment-patient_id',
        'treatment',
        'patient_id',
        'patient',
        'id',
        'CASCADE'
    );

    // Foreign key untuk doctor_id (misal tabel doctor sudah ada)
    $this->addForeignKey(
        'fk-treatment-doctor_id',
        'treatment',
        'doctor_id',
        'doctor',
        'id',
        'CASCADE'
    );
}

public function safeDown()
{
    $this->dropTable('treatment');
}
}
