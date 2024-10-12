<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tagihan}}".
 *
 * @property int $id
 * @property int $pasien_id
 * @property float $total
 * @property string $status
 * @property string $tanggal
 * @property int $obat_id
 * @property int $jumlah
 *
 * @property Obat $obat
 * @property Pasien $pasien
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tagihan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pasien_id', 'total', 'status', 'tanggal', 'obat_id', 'jumlah'], 'required'],
            [['pasien_id', 'obat_id', 'jumlah'], 'integer'],
            [['total'], 'number'],
            [['status'], 'string'],
            [['tanggal'], 'safe'],
            [['obat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Obat::class, 'targetAttribute' => ['obat_id' => 'id']],
            [['pasien_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['pasien_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pasien_id' => 'Pasien ID',
            'total' => 'Total',
            'status' => 'Status',
            'tanggal' => 'Tanggal',
            'obat_id' => 'Obat ID',
            'jumlah' => 'Jumlah',
        ];
    }

    /**
     * Gets query for [[Obat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id' => 'obat_id']);
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id' => 'pasien_id']);
    }
}
