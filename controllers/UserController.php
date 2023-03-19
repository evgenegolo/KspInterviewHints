<?php
require_once("models/UserModel.php");

class UserController
{

    public $model;
    public $message;
    public function __construct()
    {
        $this->model = UserModel::getInstance();
        //$this->auth = Auth::getInstance();
    }
    public function regestrationView()
    {
        require_once("views/RegisterationView.html");
    }
    public function loginView()
    {
        require_once("views/LoginView.html");
    }


    public function addUser()
    {

        if (isset($_POST['name']) && isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['email'])) {

            if ($this->model->create($_POST['name'], $_POST['userName'], $_POST['password'], $_POST['email'])) {
                $this->message = "User $_POST[name] added successfuly";
                require_once("views/LoginView.html");
            } else {
                require_once("views/RegisterationView.html");
            }
        }
    }

    public function login()
    {
        if (isset($_POST['userName']) && isset($_POST['password'])) {
            $result = $this->model->login($_POST['userName'], $_POST['password']);
            if (!$result) {
                echo "<script >alert('Wrong password or user name'); </script>";
                require_once("views/LoginView.html");
            } else {
                header("Location: /?controller=product&method=homeView");
            }
        }
    }

}