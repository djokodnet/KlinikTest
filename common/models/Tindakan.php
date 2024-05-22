<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $id
 * @property string $nama
 * @property float $biaya
 *
 * @property TindakanPasien[] $tindakanPasiens
 */
class Tindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'biaya'], 'required'],
            [['biaya'], 'number'],
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
            'biaya' => 'Biaya',
        ];
    }

    /**
     * Gets query for [[TindakanPasiens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakanPasiens()
    {
        return $this->hasMany(TindakanPasien::class, ['tindakan_id' => 'id']);
    }
}
