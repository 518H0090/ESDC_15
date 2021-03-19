<?php

namespace App\Components;

class ListItem{

    private $data;
    private $htmlSelect = '';

    public function __construct($data){
        $this->data = $data;
    }

    public function getAll($id){
        foreach($this->data as $value){
            if(!empty($value['id']) && $value['id'] == $id){
                $this->htmlSelect .= "<option selected value=' ". $value->id  . "  '>". $value->name ."</option>";
            }else{
                $this->htmlSelect .= "<option value=' ". $value->id  . "  '>". $value->name ."</option>";
            }
        }
        return $this->htmlSelect;
    }

    public function getAllCalendar($id){
        foreach($this->data as $value){
            if(!empty($value['id']) && $value['id'] == $id){
                $this->htmlSelect .= "<option selected value=' ". $value->id  . "  '>". 'Ngày Hủy:'.' '. $value->daywork.' '.'Ca Hủy:'.$value->ca ."</option>";
            }else{
                $this->htmlSelect .= "<option value=' ". $value->id  . "  '>". 'Ngày Hủy:'.' '. $value->daywork.' '.'Ca Hủy:'.$value->ca ."</option>";
            }
        }
        return $this->htmlSelect;
    }

//    public function getAllCalendarCa($id){
//        foreach($this->data as $value){
//            if(!empty($value['id']) && $value['id'] == $id){
//                $this->htmlSelect .= "<option selected value=' ". $value->id  . "  '>". $value->ca	 ."</option>";
//            }else{
//                $this->htmlSelect .= "<option value=' ". $value->id  . "  '>". $value->ca ."</option>";
//            }
//        }
//        return $this->htmlSelect;
//    }
}

