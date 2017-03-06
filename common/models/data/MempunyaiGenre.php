<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "mempunyaigenre".
 *
 * @property integer $ID
 * @property integer $ANIME_ID
 * @property integer $GENRE_ID
 *
 * @property Genre $gENRE
 * @property Anime $aNIME
 */
class MempunyaiGenre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mempunyaigenre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ANIME_ID', 'GENRE_ID'], 'required'],
            [['ANIME_ID', 'GENRE_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ANIME_ID' => 'Anime  ID',
            'GENRE_ID' => 'Genre  ID',
        ];
    }
     public function attributes()
    {
        return array_merge(parent::attributes(), ['ID','user_id','anime_id','genre_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGENRE()
    {
        return $this->hasOne(Genre::className(), ['GENRE_ID' => 'GENRE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getANIME()
    {
        return $this->hasOne(Anime::className(), ['ANIME_ID' => 'ANIME_ID']);
    }
}
