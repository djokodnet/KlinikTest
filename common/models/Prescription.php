<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prescription".
 *
 * @property int $id
 * @property int $patient_id
 * @property string $medicine_name
 * @property string $dosage
 * @property int $doctor_id
 * @property string $date
 * @property string|null $notes
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Doctor $doctor
 * @property Patient $patient
 */
class Prescription extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prescription';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id', 'medicine_name', 'dosage', 'doctor_id', 'date'], 'required'],
            [['patient_id', 'doctor_id'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['notes'], 'string'],
            [['medicine_name', 'dosage'], 'string', 'max' => 255],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::class, 'targetAttribute' => ['doctor_id' => 'id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::class, 'targetAttribute' => ['patient_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_id' => 'Patient ID',
            'medicine_name' => 'Medicine Name',
            'dosage' => 'Dosage',
            'doctor_id' => 'Doctor ID',
            'date' => 'Date',
            'notes' => 'Notes',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Doctor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::class, ['id' => 'doctor_id']);
    }

    /**
     * Gets query for [[Patient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::class, ['id' => 'patient_id']);
    }
}
