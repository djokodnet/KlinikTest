<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property int $id
 * @property string $name
 * @property string|null $specialization
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Prescription[] $prescriptions
 * @property Treatment[] $treatments
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'specialization'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'specialization' => 'Specialization',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Prescriptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrescriptions()
    {
        return $this->hasMany(Prescription::class, ['doctor_id' => 'id']);
    }

    /**
     * Gets query for [[Treatments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTreatments()
    {
        return $this->hasMany(Treatment::class, ['doctor_id' => 'id']);
    }
}
