<?php

namespace common\models\datamaster;

use Yii;

/**
 * This is the model class for table "komentar".
 *
 * @property integer $KOMENTAR_ID
 * @property integer $USER_ID
 * @property integer $REVIEW_ID
 * @property string $KOMENTAR
 *
 * @property User $uSER
 * @property Review $rEVIEW
 */
class Komentar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'komentar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'REVIEW_ID', 'KOMENTAR'], 'required'],
            [['USER_ID', 'REVIEW_ID'], 'integer'],
            [['KOMENTAR'], 'string'],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
            [['REVIEW_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Review::className(), 'targetAttribute' => ['REVIEW_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KOMENTAR_ID' => 'Komentar  ID',
            'USER_ID' => 'User  ID',
            'REVIEW_ID' => 'Review  ID',
            'KOMENTAR' => 'Komentar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(User::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getREVIEW()
    {
        return $this->hasOne(Review::className(), ['ID' => 'REVIEW_ID']);
    }
}
