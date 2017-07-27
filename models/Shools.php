<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shools".
 *
 * @property integer $school_id
 * @property integer $user_id
 * @property string $school_name
 * @property string $school_address
 * @property string $school_phone
 * @property string $school_fax
 * @property string $school_email
 * @property integer $school_status
 */
class Shools extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_DELETED_LABEL = 'Inactive';
    const STATUS_ACTIVE_LABEL = 'Active';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shools';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_name', 'school_address', 'school_phone', 'school_fax', 'school_email', 'school_status'], 'required'],
            [['user_id', 'school_status'], 'integer'],
            [['school_name', 'school_address', 'school_email'], 'string', 'max' => 255],
            [['school_phone', 'school_fax'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'school_id' => 'School ID',
            'user_id' => 'User ID',
            'school_name' => 'School Name',
            'school_address' => 'School Address',
            'school_phone' => 'School Phone',
            'school_fax' => 'School Fax',
            'school_email' => 'School Email',
            'school_status' => 'School Status',
        ];
    }
    
    
    public function getStatusDropdown(){
        return array(self::STATUS_ACTIVE=>self::STATUS_ACTIVE_LABEL, self::STATUS_DELETED=>self::STATUS_DELETED_LABEL);
    }
    
    public function getStatus(){
        $roles = $this->getStatusDropdown();
        return $roles[$this->status];
    }
    public function getAllShool(){
        $data= Shools::find()
                ->asArray()
                ->all();
        return $data;
    }
}
