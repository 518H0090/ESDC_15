<?php

namespace App\Components;

class Recursive{
    private $data;
    private $htmlSelect = '';

    public function __construct($data){
        $this->data = $data;
    }

    public function AllRecursive($parentid,$id = 0,$text=''){
        foreach($this->data as $value){
            if($value['parent_id'] == $id){
                if(!empty($parentid) && $value['parent_id'] == $parentid){
                    $this->htmlSelect .= "<option  selected value=' ". $value->id  . "  '>". $text .$value->name ."</option>";
                }
                else{
                    $this->htmlSelect .= "<option value=' ". $value->id  . " '>". $text .$value->name ."</option>";
                }
                $this->AllRecursive($parentid,$value->id,$text .'__');
            }
        }

        return $this->htmlSelect;
    }
}
