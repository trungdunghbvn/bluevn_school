<?php
namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * @property string $images_name
 * @property string $images_url
 * @property string $fullname
 * @property string $phone
 * @property string $address
 * @property integer $role
 * @property integer $parent_id
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_DELETED_LABEL = 'Inactive';
    const STATUS_ACTIVE_LABEL = 'Active';
    
    const ROLE_ADMIN = '1';
    const ROLE_ANGENT = '2';
    const ROLE_CUSTOMER = '3';
    const ROLE_ADMIN_LABEL = 'Admin';
    const ROLE_ANGENT_LABEL = 'Đại lý';
    const ROLE_CUSTOMER_LABEL = 'Khách hàng';
    
    const ROLE_ADMIN_SHOOLS = '4';
    const ROLE_ANGENT_SHOOLS = '5';
    const ROLE_CUSTOMER_SHOOLS = '6';
    const ROLE_ADMIN_LABEL_SHOOLS = 'Admin Shool';
    const ROLE_ANGENT_LABEL_SHOOLS = 'Giáo viên';
    const ROLE_CUSTOMER_LABEL_SHOOLS = 'Nhân viên';

    public $password_retype;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
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
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'message' => 'This email address has already been taken.'],

            [['password_hash'], 'required'],
            ['password_hash', 'string', 'min' => 8],
            ['password_retype','string'],
            
            ['images_url','string','max'=>100],
            ['phone','string','max'=>20],
            ['address','string','max'=>100],
            ['fullname','string','max'=>50],
            ['fullname', 'required'],
            ['role','integer'],

        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

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
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password_hash' => Yii::t('app', 'Password'),
            'images_url' => Yii::t('app', 'Images'),
            'images_name' => Yii::t('app', 'Images'),
            'fullname' => Yii::t('app', 'Name'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
            'password_retype' => Yii::t('app', 'Retype Password'),
            'parent_id'=>Yii::t('app', 'Customer')
        ];
    }
    
    public function getImages($with=100,$class_name='img-circle'){
        $src = Yii::$app->request->baseUrl.'/uploads/default-image.png';
        if($this->images_url)
            $src = Yii::$app->request->baseUrl.'/uploads/'.$this->images_url;
        return \yii\helpers\Html::img($src,[
                    'width'=>$with,'height'=>$with,'class'=>$class_name,'alt'=>"User Image",'style'=>'height:'.$with.'px width: '.$with.'px']
                );
    }
    
    public function getRoleDropdown(){
        
        return array(self::ROLE_ADMIN=>self::ROLE_ADMIN_LABEL, self::ROLE_ANGENT=>self::ROLE_ANGENT_LABEL, self::ROLE_CUSTOMER=>self::ROLE_CUSTOMER_LABEL);
    }
    
    public function getRole(){
        $roles = $this->getRoleDropdown()+ $this->getRoleShoolDropdown();
        return $roles[$this->role];
    }
//    admin
    
//    admin shool
    public function getRoleShoolDropdown(){
        return array(self::ROLE_ADMIN_SHOOLS=>self::ROLE_ADMIN_LABEL_SHOOLS, self::ROLE_ANGENT_SHOOLS=>self::ROLE_ANGENT_LABEL_SHOOLS, self::ROLE_CUSTOMER_SHOOLS=>self::ROLE_CUSTOMER_LABEL_SHOOLS);
    }
    
    public function getRoleShool(){
        $roles = $this->getRoleShoolDropdown();
        return $roles[$this->role];
    }
//    end admin shool
    public function getStatusDropdown(){
        return array(self::STATUS_ACTIVE=>self::STATUS_ACTIVE_LABEL, self::STATUS_DELETED=>self::STATUS_DELETED_LABEL);
    }
    
    public function getStatus(){
        $roles = $this->getStatusDropdown();
        return $roles[$this->status];
    }
    
    /**
     * Removes password reset token
     */
    public function resetPassword()
    {
        if($this->password_hash !== $this->password_retype){
            $this->addError('password_retype', 'Retype password incorrectly.');
            return false;
        }
        else{
            $this->setPassword($this->password_hash);
            return $this->save();
        }
            
    }
    
}
