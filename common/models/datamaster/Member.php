<?php

namespace common\models\datamaster;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $MEMBER_ID
 * @property integer $USER_ID
 * @property string $MEMBER_NAMA
 * @property string $DATE_JOIN
 *
 * @property User $uSER
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
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
            [['MEMBER_NAMA'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MEMBER_ID' => 'Member  ID',
            'USER_ID' => 'User  ID',
            'MEMBER_NAMA' => 'Member  Nama',
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
