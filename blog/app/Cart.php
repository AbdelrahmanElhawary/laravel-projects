<?php

namespace App;

class Cart 
{
   public $Items=NULL;
   public $ItemsQuntity=0;
   public $ItemsCost=0;
   public function __construct($oldCart)
   {
        if($oldCart){
            $this->Items=$oldCart->Items;
            $this->ItemsQuntity=$oldCart->ItemsQuntity;
            $this->ItemsCost=$oldCart->ItemsCost;
        }
   }
   public function add($item,$id){
        $temp=['qty'=>0,'price'=>$item->price,'item'=>$item];
        if($this->Items){
            if(array_key_exists($id,$this->Items)){
                $temp=$this->Items[$id];
            }
        }
        $temp['qty']++;
        $temp['price']=$temp['qty']*$item->price;
        $this->Items[$id]=$temp;
        $this->ItemsQuntity++;
        $this->ItemsCost+=$item->price;
   }
}
