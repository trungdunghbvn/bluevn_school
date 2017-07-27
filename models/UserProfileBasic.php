<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profile_basic".
 *
 * @property integer $profile_basic_id
 * @property integer $user_id
 * @property string $profile_basic_code
 * @property integer $profile_basic_gender
 * @property string $profile_basic_email
 * @property string $profile_basic_images
 * @property string $profile_basic_birthday
 * @property string $profile_basic_identity_card
 * @property string $profile_basic_address
 * @property integer $profile_basic_birthplace
 * @property string $profile_basic_phone
 * @property string $profile_basic_ethnic
 */
class UserProfileBasic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile_basic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'profile_basic_code', 'profile_basic_gender', 'profile_basic_email', 'profile_basic_images', 'profile_basic_birthday', 'profile_basic_identity_card', 'profile_basic_address', 'profile_basic_birthplace', 'profile_basic_phone', 'profile_basic_ethnic'], 'required'],
            [['user_id', 'profile_basic_gender', 'profile_basic_birthplace'], 'integer'],
            [['profile_basic_birthday'], 'safe'],
            [['profile_basic_code'], 'string', 'max' => 50],
            [['profile_basic_email', 'profile_basic_images', 'profile_basic_address'], 'string', 'max' => 255],
            [['profile_basic_identity_card', 'profile_basic_phone'], 'string', 'max' => 20],
            [['profile_basic_ethnic'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'profile_basic_id' => 'Profile Basic ID',
            'user_id' => 'User ID',
            'profile_basic_code' => 'Profile Basic Code',
            'profile_basic_gender' => 'Profile Basic Gender',
            'profile_basic_email' => 'Profile Basic Email',
            'profile_basic_images' => 'Profile Basic Images',
            'profile_basic_birthday' => 'Profile Basic Birthday',
            'profile_basic_identity_card' => 'Profile Basic Identity Card',
            'profile_basic_address' => 'Profile Basic Address',
            'profile_basic_birthplace' => 'Profile Basic Birthplace',
            'profile_basic_phone' => 'Profile Basic Phone',
            'profile_basic_ethnic' => 'Profile Basic Ethnic',
        ];
    }
}
