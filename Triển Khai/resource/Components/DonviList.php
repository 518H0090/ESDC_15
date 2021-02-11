<?php

namespace App\Components;

class DonviList{

    private $data;
    private $htmlSelect ='';

    //constructor
    public function __construct($data){
        $this->data = $data;
    }

    //function đệ quy các danh mục xài cho nhiều chức năng.
    public function ListDonvi(){
        foreach($this->data as $value){
            if(!empty($value['id'])){
                $this->htmlSelect .= "<option selected value=' ". $value->tendv  . "  '>". $value->tendv ."</option>";
            }else{
                $this->htmlSelect .= "<option value=' ". $value->tendv  . "  '>". $value->tendv ."</option>";
            }
        }
        return $this->htmlSelect;
    }

}