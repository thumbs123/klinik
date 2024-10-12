<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Obat}}".
 *
 * @property int $id
 * @property string $nama
 * @property float $harga
 * @property string $created_at
 * @property string $updated_at
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Obat}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'harga'], 'required'],
            [['harga'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
