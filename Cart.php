<?php


class Cart
{
    private array $items = [];

    //TODO Skriv getter för items
    public function getItems() {
        return $this -> items;
    }

    /*
     Skall lägga till en produkt i kundvagnen genom att
     skapa ett nytt cartItem och lägga till i $items array.
     Metoden skall returnera detta cartItem.

     VG: Om produkten redan finns i kundvagnen
     skall istället quantity på cartitem ökas. //Ass.array kan lösa detta inom addProduct ex. $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
     */
    public function addProduct($product)
    {
        $cartItem = new CartItem($product, 1);
        
        array_push($this->items, $cartItem);

        return $cartItem;
    }


    //Skall ta bort en produkt ur kundvagnen (använd unset())
    public function removeProduct($product)
    {


    }

    //Skall returnera totala antalet produkter i kundvagnen
    //OBS: Ej antalet unika produkter
    public function getTotalQuantity()
    {
        $totQuantity = count($this->items);
        return $totQuantity;
    }

    //Skall räkna ihop totalsumman för alla produkter i kundvagnen
    //VG: Tänk på att ett cartitem kan ha olika quantity
    public function getTotalSum()
    {
      $cartItemPrice = 0;
        foreach ($this->items as $item) 
        {
            $cartItemPrice += $item->getProduct()->getPrice();//för VG så bör det vara att price ska * med quantity för resp. cartitem
        }

        $count = 0+$cartItemPrice;
        return $count;
    } 
}
