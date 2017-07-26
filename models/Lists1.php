<?php
namespace app\models;

use Yii;

class Lists extends \yii\base\Model
{
    public $status=array(1=>'Active',0=>'Inactive');
    public $type_category=array(0=>'Sản phẩm',1=>'Tin tức',2=>'Liên kết',3=>'Khối trang');
    const FOMAT_DATE_VIEW = 'd/m/Y';
    const FOMAT_DATE_SQL = 'Y-m-d';
    const FOMAT_DATETIME_VIEW = 'd/m/Y H:i:s';
    const FOMAT_DATETIME_SQL = 'Y-m-d H:i:s';
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
    public function getSelectOptionList($list_name=false,$list_arr=false,$name=false,$event="",$selected=false)
    {
        if(!$list_arr)
            $list_arr = $this->$list_name;
        if(!$name)
            $name = $list_name."[]";
        $select ="<select class='form-control' id=".$list_name."  name=".$name." ".$event." >";
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
    
    public static function replace_vietnameses($string_input)
    {

        return str_replace(ListSetup::$TViet,  ListSetup::$koDau,$string_input);
    }
    
    public function getDisplayDate($date=false,$format=false){
        if(!$date)
            $date = date ('Y-m-d H:i:s');
        if($date=='0000-00-00' || $date=='0000-00-00 00:00:00' || $date=='1970-01-01 00:00:00' || $date=='1970-01-01')
            return "";
        if($format)
            return date($format, strtotime($date));
        else
            return date(self::FOMAT_DATE_VIEW,  strtotime($date));
    }
    
    public function getDisplayDateTime($date=false,$format=false){
        if(!$date)
            $date = date ('Y-m-d H:i:s');
        if($date=='0000-00-00' || $date=='0000-00-00 00:00:00' || $date=='1970-01-01 00:00:00' || $date=='1970-01-01')
            return "";
        if($format)
            return date($format, strtotime($date));
        else
            return date(self::FOMAT_DATETIME_VIEW,  strtotime($date));
    }
    
    public function getDisplayDateSql($date=false,$format=false){
        if(!$date)
            $date = date ('Y-m-d H:i:s');
        if($date=='0000-00-00' || $date=='0000-00-00 00:00:00' || $date=='1970-01-01 00:00:00' || $date=='1970-01-01')
            return "";
        if($format)
            return date($format, strtotime($date));
        else
            return date(self::FOMAT_DATE_SQL,  strtotime($date));
    }
    
    public function getDisplayDateTimeSql($date=false,$format=false){
        if(!$date)
            $date = date ('Y-m-d H:i:s');
        if($date=='0000-00-00' || $date=='0000-00-00 00:00:00' || $date=='1970-01-01 00:00:00' || $date=='1970-01-01')
            return "";
        if($format)
            return date($format, strtotime($date));
        else
            return date(self::FOMAT_DATETIME_SQL,  strtotime($date));
    }
    
    public function getDisplayPrice($price){
        return number_format($price,0,',','.');
    }
    
}
