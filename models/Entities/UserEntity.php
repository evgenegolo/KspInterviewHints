<?php
class UserEntity
{
    private int $userId;
    private string $name;
    private string $userName;
    private string $email;
    private string $password;

    //GETERS
    public function getUserId()
    {
        return $this->userId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getuserName()
    {
        return $this->userName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }



    //SETERS
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
?>