<?php

namespace common\models\datamaster;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $ADMIN_ID
 * @property integer $USER_ID
 * @property string $NAMA
 * @property string $DATE_JOIN
 *
 * @property User $uSER
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID'], 'required'],
            [['USER_ID'], 'integer'],
            [['DATE_JOIN'], 'safe'],
            [['NAMA'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ADMIN_ID' => 'Admin  ID',
            'USER_ID' => 'User  ID',
            'NAMA' => 'Nama',
            'DATE_JOIN' => 'Date  Join',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(User::className(), ['USER_ID' => 'USER_ID']);
    }
}
