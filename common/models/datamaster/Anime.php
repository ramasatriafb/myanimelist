<?php

namespace common\models\datamaster;

use Yii;

/**
 * This is the model class for table "anime".
 *
 * @property integer $ANIME_ID
 * @property string $ANIME_TITLE
 * @property string $ANIME_PICT
 * @property File[] $files
 * @property string $EPISODE
 * @property string $PREMIRED
 * @property string $SYNOPSIS
 * @property string $DATE_CREATE
 *
 * @property Mempunyaigenre[] $mempunyaigenres
 * @property Mempunyairating[] $mempunyairatings
 */
class Anime extends \yii\db\ActiveRecord
{
    public $FILE_FILE;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ANIME_TITLE', 'FILE_FILE', 'EPISODE', 'PREMIRED', 'SYNOPSIS', 'DATE_CREATE'], 'required'],
            [['SYNOPSIS'], 'string'],
            [['DATE_CREATE'], 'safe'],
            [['ANIME_TITLE', 'PREMIRED'], 'string', 'max' => 50],
            [['ANIME_PICT'], 'string', 'max' => 200],
            [['EPISODE'], 'string', 'max' => 20],
            [['FILE_FILE'], 'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ANIME_ID' => 'Anime  ID',
            'ANIME_TITLE' => 'Anime  Title',
            'ANIME_PICT' => 'Anime  Pict',
            'EPISODE' => 'Episode',
            'PREMIRED' => 'Premired',
            'SYNOPSIS' => 'Synopsis',
            'DATE_CREATE' => 'Date  Create',
            'FILE_FILE' => 'File',
       
        ];
    }


    public function attributes()
    {
        return array_merge(parent::attributes(), ['id','title','pict','episode','premired','synopsis','rating','user','genre']);
    }


    public function upload()
    {
        //$this->FILE_FILE->saveAs(Yii::getAlias('@common/uploads/file/') . $this->FILE_FILE->baseName . '.' . $this->FILE_FILE->extension);
        $this->FILE_FILE->saveAs(Yii::getAlias('@frontend/web/uploads/img/anime/') . $this->FILE_FILE->baseName . '.' . $this->FILE_FILE->extension);
        //return 'uploads/file/' .$this->FILE_FILE->baseName . '.' . $this->FILE_FILE->extension;
        return $this->FILE_FILE->baseName . '.' . $this->FILE_FILE->extension;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMempunyaigenres()
    {
        return $this->hasMany(Mempunyaigenre::className(), ['ANIME_ID' => 'ANIME_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMempunyairatings()
    {
        return $this->hasMany(Mempunyairating::className(), ['ANIME_ID' => 'ANIME_ID']);
    }
}
