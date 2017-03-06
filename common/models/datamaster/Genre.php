<?php

namespace common\models\datamaster;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property integer $GENRE_ID
 * @property string $GENRE
 *
 * @property Mempunyaigenre[] $mempunyaigenres
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GENRE'], 'required'],
            [['GENRE'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GENRE_ID' => 'Genre  ID',
            'GENRE' => 'Genre',
        ];
    }
      public function attributes()
    {
        return array_merge(parent::attributes(), ['ID','genre','anime_id','genre_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMempunyaigenres()
    {
        return $this->hasMany(Mempunyaigenre::className(), ['GENRE_ID' => 'GENRE_ID']);
    }
}
