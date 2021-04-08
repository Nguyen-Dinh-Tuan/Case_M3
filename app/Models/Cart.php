<?php


namespace App\Models;


use PhpParser\Node\Stmt\DeclareDeclare;

class Cart
{
    public $items = [];
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addToCart($id, $product)
    {
        $storeProduct = [
            'item' => $product,
            'totalQty' => 0,
            'totalPrice' => 0
        ];

        if (array_key_exists($id, $this->items)) {
            $storeProduct = $this->items[$id];
        }

        $storeProduct['totalQty']++;
        $storeProduct['totalPrice'] += $product->price;

        $this->items[$id] = $storeProduct;
        $this->totalQty++;
        $this->totalPrice += $product->price;
    }

    public function removeProduct($id, $product, $qty)
    {
        if ($qty == -1) {
            $this->totalQty -= $this->items[$id]['totalQty'];
            $this->totalPrice -= $this->items[$id]['totalPrice'];
            unset($this->items[$id]);
        } else {
            if ($this->items[$id]['totalQty'] <= 1) {
                $this->totalQty -= $this->items[$id]['totalQty'];
                $this->totalPrice -= $this->items[$id]['totalPrice'];
                unset($this->items[$id]);
            } else {
                $this->items[$id]['totalQty']--;
                $this->items[$id]['totalPrice'] -= $product->price;

                $this->totalQty--;
                $this->totalPrice -= $product->price;
            }
        }
    }

    public function clearCart()
    {
        unset($this->items);
        $this->totalQty = 0;
        $this->totalPrice = 0;
    }

    function updateCart($id, $newQuantity)
    {
        if (key_exists($id, $this->items)) {
            $storeProductUpdate = $this->items[$id];
            $currentTotalQty = $storeProductUpdate['totalQty'];
            $this->totalQty -= $currentTotalQty;
            $this->totalQty += $newQuantity;

            $this->totalPrice -= $storeProductUpdate['totalPrice'];
            $storeProductUpdate['totalQty'] = $newQuantity;
            $storeProductUpdate['totalPrice'] = $newQuantity * $storeProductUpdate['item']->price;
            $this->totalPrice += $storeProductUpdate['totalPrice'];
            $this->items[$id] = $storeProductUpdate;

        }
    }
}
