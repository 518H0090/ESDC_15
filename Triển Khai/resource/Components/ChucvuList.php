<?php

namespace App\Components;

class ChucvuList{

    private $data;
    private $htmlSelect ='';

    //constructor
    public function __construct($data){
        $this->data = $data;
    }

    //function đệ quy các danh mục xài cho nhiều chức năng.
    public function Chucvu(){
        foreach($this->data as $value){
            if(!empty($value['id'])){
                $this->htmlSelect .= "<option selected value=' ". $value->TenCV  . "  '>". $value->TenCV ."</option>";
            }else{
                $this->htmlSelect .= "<option value=' ". $value->TenCV  . "  '>". $value->TenCV ."</option>";
            }
        }
        return $this->htmlSelect;
    }

}