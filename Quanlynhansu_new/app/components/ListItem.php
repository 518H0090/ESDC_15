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
}

