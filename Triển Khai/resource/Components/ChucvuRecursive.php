<?php

namespace App\Components;

class ChucvuRecursive{

    private $data;
    private $htmlSelect ='';

    //constructor
    public function __construct($data){
        $this->data = $data;
    }

    //function đệ quy các danh mục xài cho nhiều chức năng.
    public function Recursive($parentid,$id = 0,$text=''){
        foreach($this->data as $value){
            if($value['parent_id'] == $id){
                if(!empty($parentid) && $value['parent_id'] == $parentid){
                    $this->htmlSelect .= "<option  selected value=' ". $value->id  . "  '>". $text .$value->TenCV ."</option>";
                }
                else{
                    $this->htmlSelect .= "<option value=' ". $value->id  . " '>". $text .$value->TenCV ."</option>";
                }
                $this->Recursive($parentid,$value->id,$text .'_Sub_');
            }
        }

        return $this->htmlSelect;
    } 

}