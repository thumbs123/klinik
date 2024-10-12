<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pasien}}".
 *
 * @property int $id
 * @property string $nama
 * @property string $tanggal_lahir
 * @property string|null $alamat
 * @property string|null $no_telp
 * @property int $wilayah_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Wilayah $wilayah
 * @property Pendaftaran[] $pendaftarans
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pasien}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'tanggal_lahir', 'wilayah_id'], 'required'],
            [['tanggal_lahir', 'created_at', 'updated_at'], 'safe'],
            [['alamat'], 'string'],
            [['nama'], 'string', 'max' => 100],
            [['no_telp'], 'string', 'max' => 15],
            [['wilayah_id'], 'integer'],
            [['wilayah_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::class, 'targetAttribute' => ['wilayah_id' => 'id']],
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
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'no_telp' => 'No Hp',
            'wilayah_id' => 'Wilayah',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Wilayah]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah()
    {
        return $this->hasOne(Wilayah::class, ['id' => 'wilayah_id']);
    }

    /**
     * Gets query for [[Pendaftarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getPendaftarans()
    // {
    //     return $this->hasMany(Pendaftaran::class, ['pasien_id' => 'id']);
    // }
}
