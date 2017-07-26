<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "list_setup".
 *
 * @property integer $list_id
 * @property string $list_name
 * @property integer $list_parent
 * @property string $list_value
 * @property string $list_description
 */
class ListSetup extends \yii\db\ActiveRecord
{
    const THEME_PARK = 'old';
    const THEME_PARK_NEW = 'new';
    const FOMAT_DATE_VIEW = 'd/m/Y';
    const FOMAT_DATE_SQL = 'Y-m-d';
    const FOMAT_DATETIME_VIEW = 'd/m/Y H:i:s';
    const FOMAT_DATETIME_SQL = 'Y-m-d H:i:s';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'list_setup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['list_name', 'list_parent'], 'required'],
            [['list_parent'], 'integer'],
            [['list_name', 'list_value'], 'string', 'max' => 100],
            [['list_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'list_id' => Yii::t('app', 'List ID'),
            'list_name' => Yii::t('app', 'Name'),
            'list_parent' => Yii::t('app', 'List Parent'),
            'list_value' => Yii::t('app', 'Value'),
            'list_description' => Yii::t('app', 'Description'),
        ];
    }
    
    static public function getItemByList($parent_list_name){
        $array = array();
        $parent = ListSetup::find()->where(['list_name'=>$parent_list_name])->one();
        if($parent){
            $items = ListSetup::find()->where(['list_parent'=>$parent->list_id])->all();
            foreach ($items as $item) {
                $array[$item->list_value] = Yii::t('app',$item->list_name);
            }
        }
        return $array;
    }



    public function getSelectOptionList($list_name=false,$list_arr=false,$name=false,$event="",$selected=false,$id_name=false,$class='form-control')
    {
        $id= "";
        if(!$list_arr)
            $list_arr = $this->getItemByList($list_name);
        if(!$name)
            $name = $list_name."[]";
        if($list_name)
            $id = $list_name;
        if($id_name)
            $id = $id_name;
        $select ="<select class='".$class."' id=".$id."  name=".$name." ".$event." >";
        foreach ($list_arr as $key=>$value)
        {
            if($selected && $key==$selected )
                $select.="<option value=".$key." selected >".$value."</option>";
            else
                $select.="<option value=".$key." >".$value."</option>";
        }
        $select.="</select>";
        return $select;
    }
    
    public function getItemName($list_name,$id)
    {
        $arr_list = $this->$list_name;
        return $arr_list[$id];
    }
    
    public static $TViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
    "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
    ,"ế","ệ","ể","ễ",
    "ì","í","ị","ỉ","ĩ",
    "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
    ,"ờ","ớ","ợ","ở","ỡ",
    "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
    "ỳ","ý","ỵ","ỷ","ỹ",
    "đ",
    "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
    ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
    "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
    "Ì","Í","Ị","Ỉ","Ĩ",
    "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
    ,"Ờ","Ớ","Ợ","Ở","Ỡ",
    "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
    "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
    "Đ");
    
    public static $koDau=array("a","a","a","a","a","a","a","a","a","a","a"
     ,"a","a","a","a","a","a",
     "e","e","e","e","e","e","e","e","e","e","e",
     "i","i","i","i","i",
     "o","o","o","o","o","o","o","o","o","o","o","o"
     ,"o","o","o","o","o",
     "u","u","u","u","u","u","u","u","u","u","u",
     "y","y","y","y","y",
     "d",
     "A","A","A","A","A","A","A","A","A","A","A","A"
     ,"A","A","A","A","A",
     "E","E","E","E","E","E","E","E","E","E","E",
     "I","I","I","I","I",
     "O","O","O","O","O","O","O","O","O","O","O","O"
     ,"O","O","O","O","O",
     "U","U","U","U","U","U","U","U","U","U","U",
     "Y","Y","Y","Y","Y",
     "D");
    
 public static function replace_vietnameses($string_input)
    {

        return str_replace(ListSetup::$TViet,  ListSetup::$koDau,$string_input);
    }
    
    public static function getDisplayDate($date,$format=false){
        if($date=='0000-00-00' || $date=='0000-00-00 00:00:00' || $date=='1970-01-01 00:00:00' || $date=='1970-01-01' || $date==NULL)
            return "";
        if($format)
            return date($format, strtotime($date));
        else
            return date(ListSetup::FOMAT_DATE_VIEW,  strtotime($date));
    }
    
    public static function getDisplayDateTime($date,$format=false){
        if($date=='0000-00-00' || $date=='0000-00-00 00:00:00' || $date=='1970-01-01 00:00:00' || $date=='1970-01-01')
            return "";
        if($format)
            return date($format, strtotime($date));
        else
            return date(ListSetup::FOMAT_DATETIME_VIEW,  strtotime($date));
    }
    
    public static function getDisplayDateSql($date,$format=false){
        if($date=='0000-00-00' || $date=='0000-00-00 00:00:00' || $date=='1970-01-01 00:00:00' || $date=='1970-01-01')
            return "";
        if($format)
            return date($format, strtotime($date));
        else
            return date(ListSetup::FOMAT_DATE_SQL,  strtotime($date));
    }
    
    public static function getDisplayDateTimeSql($date,$format=false){
        if($date=='0000-00-00' || $date=='0000-00-00 00:00:00' || $date=='1970-01-01 00:00:00' || $date=='1970-01-01')
            return "";
        if($format)
            return date($format, strtotime($date));
        else
            return date(ListSetup::FOMAT_DATETIME_SQL,  strtotime($date));
    }
    
    public static function getDisplayPrice($price){
        return number_format($price,0,',','.');
    }
    
    public function delete() {
        $result = parent::delete();
        if($result)
            ListSetup::deleteAll ('list_id='.$this->list_parent);
        return $result;
    }
}
