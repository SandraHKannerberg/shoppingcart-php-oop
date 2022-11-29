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
     skall istället quantity på cartitem ökas.
     */
    public function addProduct($product)
    {
        $cartItem = new CartItem($product, 1);

        /*$cartItem = new CartItem($product, $quantity);

        //if (key has a value) {
            $this->items[$product->getId()] = $cartItem;//Skapar en ny nyckel eftersom vi redan har en array

        } else {
            //Öka quantity
        }*/

        return $cartItem;
    }

    //Skall ta bort en produkt ur kundvagnen (använd unset())
    public function removeProduct($product)
    {
        unset($this->items[$product->getId()]);
    }

    //Skall returnera totala antalet produkter i kundvagnen
    //OBS: Ej antalet unika produkter
    public function getTotalQuantity()
    {
        $calcQty = 0;
        foreach ($this->items as $item) 
        {
            $calcQty += $item->getQuantity();
        }

        $totQty = 0+$calcQty;
        return $totQty;
    }

    //Skall räkna ihop totalsumman för alla produkter i kundvagnen
    //VG: Tänk på att ett cartitem kan ha olika quantity
    public function getTotalSum()
    {
      $calcPrice = 0;
        foreach ($this->items as $item) 
        {
            $calcPrice += $item->getProduct()->getPrice() * $item->getQuantity();
        }

        $totSum = 0+$calcPrice;
        return $totSum;
    } 
}
