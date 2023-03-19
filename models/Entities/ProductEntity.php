<?php
class ProductEntity
{
    private int $productId;

    private string $productName;

    private int $price;


    //Geters

    public function getProductId()
    {
        return $this->productId;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function getPrioce()
    {
        return $this->price;
    }


    //Seters
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}
?>