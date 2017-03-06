<?php

namespace common\models\datamaster;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $USER_ID
 * @property integer $ROLE_ID
 * @property string $USER_NAMA
 * @property string $USER_PASSWORD
 * @property string $USER_EMAIL
 * @property string $USER_AVATAR
 * @property integer $USER_AKTIF
 *
 * @property File[] $files
 * @property Admin[] $admins
 * @property Komentar[] $komentars
 * @property Member[] $members
 * @property Mempunyairating[] $mempunyairatings
 * @property Review[] $reviews
 * @property Role $rOLE
 */
class User extends \yii\db\ActiveRecord
{
    public $FILE_FILE;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ROLE_ID', 'USER_AKTIF'], 'integer'],
            [['USER_NAMA', 'USER_PASSWORD', 'USER_EMAIL', 'USER_AKTIF'], 'required'],
            [['USER_NAMA'], 'string', 'max' => 20],
            [['USER_PASSWORD', 'USER_AVATAR'], 'string', 'max' => 100],
            [['USER_EMAIL'], 'string', 'max' => 200],
            [['FILE_FILE'], 'file'],
            [['ROLE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['ROLE_ID' => 'ROLE_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => 'User  ID',
            'ROLE_ID' => 'Role  ID',
            'USER_NAMA' => 'User  Nama',
            'USER_PASSWORD' => 'User  Password',
            'USER_EMAIL' => 'User  Email',
            'USER_AVATAR' => 'User  Avatar',
            'USER_AKTIF' => 'User  Aktif',
            'FILE_FILE' => 'File',
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), ['id','ava','user_nama','user_email','nama','join','file','user_id']);
    }
    
    public function upload()
    {
        //$this->FILE_FILE->saveAs(Yii::getAlias('@common/uploads/file/') . $this->FILE_FILE->baseName . '.' . $this->FILE_FILE->extension);
        $this->FILE_FILE->saveAs(Yii::getAlias('@frontend/web/uploads/img/ava/') . $this->FILE_FILE->baseName . '.' . $this->FILE_FILE->extension);
        //return 'uploads/file/' .$this->FILE_FILE->baseName . '.' . $this->FILE_FILE->extension;
        return $this->FILE_FILE->baseName . '.' . $this->FILE_FILE->extension;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmins()
    {
        return $this->hasMany(Admin::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKomentars()
    {
        return $this->hasMany(Komentar::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Member::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMempunyairatings()
    {
        return $this->hasMany(Mempunyairating::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getROLE()
    {
        return $this->hasOne(Role::className(), ['ROLE_ID' => 'ROLE_ID']);
    }
}
