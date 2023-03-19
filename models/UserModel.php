<?php
require_once("Entities/UserEntity.php");
require_once("BaseModel.php");

/* user model class
 *  singleton
 */
class UserModel extends BaseModel
{
    protected static $class = "UserEntity";

    /* 
     *  creates instance of user model if needed
     */
    public static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new UserModel();
        return self::$instance;
    }

    public static function create(string $name, string $userName, string $password, string $email)
    {
        if (self::selectUser($userName)) {
            $password = crypt($password, 'rl');
            $data = [
                "name" => $name,
                "userName" => $userName,
                "password" => $password,
                "email" => $email,
            ];

            self::connect();

            $query = "INSERT INTO user (password, name, userName, email) VALUES (:password, :name, :userName,:email)";

            try {
                $insert_id = self::$connection->prepare($query)->execute($data);
                return $insert_id;
            } catch (Exception $e) {
                return false;
            } finally {
                self::disconnect();
            }
        } else {
            return false;
        }
    }

    public static function login(string $userName, string $password)
    {
        try {
            self::connect();
            $sqlSt = self::$connection->prepare("SELECT * FROM user WHERE userName = :userName");
            $sqlSt->execute([':userName' => $userName]);
            $result = $sqlSt->fetchObject(self::$class);

            if (!$result)
                return false;
            else
                return hash_equals($result->getPassword(), crypt($password, $result->getPassword()));
        } catch (Exception $e) {
            var_dump($e);
            return false;
        } finally {
            self::disconnect();
        }
    }

    public static function selectUser(string $userName)
    {

        try {
            self::connect();
            $sqlSt = self::$connection->prepare("SELECT * FROM user WHERE userName = :userName");
            $sqlSt->execute([':userName' => $userName]);
            $result = $sqlSt->fetchObject(self::$class);
            var_dump($result);
            return !$result ? true : false;
        } catch (Exception $e) {
            return false;
        } finally {
            self::disconnect();
        }
    }

}