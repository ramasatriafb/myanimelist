<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $USER_ID
 * @property integer $ROLE_ID
 * @property string $USER_NAMA
 * @property string $USER_PASSWORD
 * @property integer $USER_AKTIF
 *
 * @property Artikel[] $artikels
 * @property File[] $files
 * @property Ibujanda[] $ibujandas
 * @property Komentar[] $komentars
 * @property Manajemendsm[] $manajemendsms
 * @property Notifikasi[] $notifikasis
 * @property Pengajar[] $pengajars
 * @property Pengisikajian[] $pengisikajians
 * @property Pengurus[] $penguruses
 * @property Saran[] $sarans
 * @property Stafdsm[] $stafdsms
 * @property Role $rOLE
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
	//$username;
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
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'USER_NAMA', 'USER_PASSWORD', 'USER_AKTIF'], 'required'],
            [['USER_ID', 'ROLE_ID', 'USER_AKTIF'], 'integer'],
            [['USER_NAMA'], 'string', 'max' => 20],
            [['USER_PASSWORD'], 'string', 'max' => 100]
        ];
    }

	public function getId()
    {
        return $this->getPrimaryKey();
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
            'USER_AKTIF' => 'User  Aktif',
        ];
    }

	//cari berdasarkan username
	public static function findByUsername($username)
    {
        return static::findOne(['USER_NAMA' => $username, 'USER_AKTIF' => '1']);
    }
	
	/**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['USER_ID' => $id, 'USER_AKTIF' => "1"]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
	
	/**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        //return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        //return $this->getAuthKey() === $authKey;
    }
	
	//validasi password
	public function validatePassword($password)
    {
       return Yii::$app->security->validatePassword($password, $this->USER_PASSWORD);
    }
        //return $this->USER_PASSWORD === md5($password);
   
	
	/**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
	
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtikels()
    {
        return $this->hasMany(Artikel::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIbujandas()
    {
        return $this->hasMany(Ibujanda::className(), ['USER_ID' => 'USER_ID']);
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
    public function getManajemendsms()
    {
        return $this->hasMany(Manajemendsm::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifikasis()
    {
        return $this->hasMany(Notifikasi::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajars()
    {
        return $this->hasMany(Pengajar::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengisikajians()
    {
        return $this->hasMany(Pengisikajian::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenguruses()
    {
        return $this->hasMany(Pengurus::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSarans()
    {
        return $this->hasMany(Saran::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStafdsms()
    {
        return $this->hasMany(Stafdsm::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getROLE()
    {
        return $this->hasOne(Role::className(), ['ROLE_ID' => 'ROLE_ID']);
    }
}
