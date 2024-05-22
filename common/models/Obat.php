<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $id
 * @property string $nama
 * @property float $harga
 *
 * @property ObatPasien[] $obatPasiens
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'harga'], 'required'],
            [['harga'], 'number'],
            [['nama'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'harga' => 'Harga',
        ];
    }

    /**
     * Gets query for [[ObatPasiens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObatPasiens()
    {
        return $this->hasMany(ObatPasien::class, ['obat_id' => 'id']);
    }
}
