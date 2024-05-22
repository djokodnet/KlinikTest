<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property int $patient_id
 * @property int $doctor_id
 * @property int|null $treatment_id
 * @property int|null $medicine_id
 * @property float $amount
 * @property string $transaction_date
 * @property string|null $notes
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Doctor $doctor
 * @property Medicine $medicine
 * @property Patient $patient
 * @property Treatment $treatment
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id', 'doctor_id', 'amount', 'transaction_date'], 'required'],
            [['patient_id', 'doctor_id', 'treatment_id', 'medicine_id'], 'integer'],
            [['amount'], 'number'],
            [['transaction_date', 'created_at', 'updated_at'], 'safe'],
            [['notes'], 'string'],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::class, 'targetAttribute' => ['doctor_id' => 'id']],
            [['medicine_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medicine::class, 'targetAttribute' => ['medicine_id' => 'id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::class, 'targetAttribute' => ['patient_id' => 'id']],
            [['treatment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Treatment::class, 'targetAttribute' => ['treatment_id' => 'id']],
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
            'doctor_id' => 'Doctor ID',
            'treatment_id' => 'Treatment ID',
            'medicine_id' => 'Medicine ID',
            'amount' => 'Amount',
            'transaction_date' => 'Transaction Date',
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
     * Gets query for [[Medicine]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedicine()
    {
        return $this->hasOne(Medicine::class, ['id' => 'medicine_id']);
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

    /**
     * Gets query for [[Treatment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTreatment()
    {
        return $this->hasOne(Treatment::class, ['id' => 'treatment_id']);
    }
}
