<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $tanggal_lahir
 *
 * @property Pendaftaran[] $pendaftarans
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'tanggal_lahir'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['nama'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 255],
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
            'alamat' => 'Alamat',
            'tanggal_lahir' => 'Tanggal Lahir',
        ];
    }

    /**
     * Gets query for [[Pendaftarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, ['pasien_id' => 'id']);
    }
}
