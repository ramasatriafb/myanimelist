<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "mempunyairating".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property integer $ANIME_ID
 * @property string $RATING
 *
 * @property User $uSER
 * @property Anime $aNIME
 */
class MempunyaiRating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mempunyairating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'ANIME_ID', 'RATING'], 'required'],
            [['USER_ID', 'ANIME_ID'], 'integer'],
            [['RATING'], 'string', 'max' => 20]
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
            'RATING' => 'Rating',
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), ['ID','user_id','anime_id','rating']);
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
    public function getANIME()
    {
        return $this->hasOne(Anime::className(), ['ANIME_ID' => 'ANIME_ID']);
    }
}
