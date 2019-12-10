<?php
namespace App;

class Cart{
    public $items=null;
    public $totalQuantity = 0;
    public $totalPrice = 0;
    public $tax = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
        $this->checkTax();
    }

    public function addOrUpdate($item, $id, $quantity = 0){
        $storedItem = ["quantity"=> 0, "price"=>$item->price,"item"=>$item];
        $check = false;
        if ($this->items != null) {
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
       }

       if ($quantity == 0 || $quantity < 0) {
            $storedItem["quantity"]++;
            $this->totalQuantity++;
        }else {
                $storedItem["quantity"] = $quantity;
                $check = true;
        }   
        $storedItem["price"] = $item->price*$storedItem["quantity"];

        $this->items[$id] = $storedItem;
        
        if ($check) {
            $this->totalQuantity = $this->grandTotal();
           
        }
        $this->totalPrice = 0;  
        $this->totalPrice = $this->grandPrice();  
        $this->calculateTax();
    }

    public function grandTotal(){
       $sum = 0;

        foreach ($this->items as $item) {
            $sum += $item["quantity"];
        }
       return $sum;
    }

    public function grandPrice(){
        $sum = 0;
 
         foreach ($this->items as $item) 
             $sum += $item["price"];
         
        return $sum;
     }

     public function calculateTax(){
        $this->checkTax();

         // Apply tax
        $this->totalPrice += ( $this->totalPrice * $this->tax)/100;


     }

     public function remove($id){
         unset($this->items[$id]);
         $this->totalPrice = $this->grandPrice();
         $this->totalQuantity = $this->grandPrice();
         $this->calculateTax();
     }

     public function checkTax(){
        if ($this->items != null) {
            if (count($this->items) == 0) {
                $this->tax = 0;
            }else{
                $this->tax = config("app.tax",50);
            }
        }
     }

     public function updateSize($id, $size){
         $item = $this->items[$id];
         $item["item"]["size"] = $size;
         $this->items[$id] = $item;
     }
}
?>