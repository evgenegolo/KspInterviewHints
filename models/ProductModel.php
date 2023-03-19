<?php
require_once("Entities/ProductEntity.php");
require_once("BaseModel.php");

/* user model class
 *  singleton
 */
class ProductModel extends BaseModel
{
    protected static $class = "ProductEntity";

    /* 
     *  creates instance of user model if needed
     */
    public static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new ProductModel();
        return self::$instance;
    }

    public static function selectAllPropduts(int $limit)
    {
        switch ($limit) {
            case 0:
                $query = "SELECT * FROM `products`";
                break;
        }
        try {
            self::connect();
            $result = self::$connection->query($query);
            $resultArray = $result->fetchAll();
            self::disconnect();
            return $resultArray;
        } catch (Exception $e) {
            return false;
        } finally {
            self::disconnect();
        }

    }

}