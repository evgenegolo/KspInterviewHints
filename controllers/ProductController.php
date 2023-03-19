<?php
require_once("models/ProductModel.php");

class ProductController
{

    public $model;
    public $message;
    public function __construct()
    {
        $this->model = ProductModel::getInstance();
    }
    public function homeView()
    {
        require_once("views/HomeView.php");
    }
    public function getAllProducts($limit = 0)
    {
        $result = $this->model->selectAllPropduts($limit);
        return $result;
    }
}
?>