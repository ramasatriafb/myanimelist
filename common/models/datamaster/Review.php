<?php

namespace common\models\datamaster;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property integer $ANIME_ID
 * @property string $REVIEW
 * @property string $DATE_REVIEW
 *
 * @property User $uSER
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'ANIME_ID', 'REVIEW', 'DATE_REVIEW'], 'required'],
            [['USER_ID', 'ANIME_ID'], 'integer'],
            [['REVIEW'], 'string'],
            [['DATE_REVIEW'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'USER_ID' => 'User  ID',
            'ANIME_ID' => 'Anime  ID',
            'REVIEW' => 'Review',
            'DATE_REVIEW' => 'Date  Review',
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), ['id','title','pict','review','date_review','user','ava','id_anime','user_id','jumlah_komentar','komentar','date']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(User::className(), ['USER_ID' => 'USER_ID']);
    }
    
}
