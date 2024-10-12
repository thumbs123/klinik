<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tindakan}}".
 *
 * @property int $id
 * @property string $nama
 * @property string|null $deskripsi
 * @property float $biaya
 */
class Tindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tindakan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'biaya'], 'required'],
            [['biaya'], 'number'],
            [['nama', 'deskripsi'], 'string', 'max' => 255],
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
            'deskripsi' => 'Deskripsi',
            'biaya' => 'Biaya',
        ];
    }
}
