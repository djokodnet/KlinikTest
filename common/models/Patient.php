<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property int $id
 * @property string $name
 * @property string|null $birthdate
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string $created_at
 * @property string $updated_at
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['birthdate', 'created_at', 'updated_at'], 'safe'],
            [['name', 'address', 'phone', 'email'], 'string', 'max' => 255],
            [['email'], 'unique'],
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
            'birthdate' => 'Birthdate',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
