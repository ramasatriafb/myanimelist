<?php

namespace common\models\datamaster;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property integer $ROLE_ID
 * @property string $ROLE_KODE
 * @property string $ROLE_NAMA
 * @property string $ROLE_DESKRIPSI
 *
 * @property User[] $users
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ROLE_KODE', 'ROLE_NAMA', 'ROLE_DESKRIPSI'], 'required'],
            [['ROLE_KODE'], 'string', 'max' => 10],
            [['ROLE_NAMA'], 'string', 'max' => 20],
            [['ROLE_DESKRIPSI'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ROLE_ID' => 'Role  ID',
            'ROLE_KODE' => 'Role  Kode',
            'ROLE_NAMA' => 'Role  Nama',
            'ROLE_DESKRIPSI' => 'Role  Deskripsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['ROLE_ID' => 'ROLE_ID']);
    }
}
