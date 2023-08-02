<?php
require_once dirname(__FILE__) . "../../../reg/conf.php";

class userModel
{
    public $pdo;
    public $logFile = "../../../reg/log/model.log";
    public $user_id;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(DSN, USER, PASS);

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }

    }

    public function checkUserExist($phone)
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM `user` WHERE  phone = :phone");
            $statement->bindValue(':phone', $phone);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $timestamp = date("Y-m-d H:i:s");
            $msg = $e->getMessage();
            $logMsg = $timestamp . "-" . $msg;
            file_put_contents($this->logFile, $logMsg, FILE_APPEND);
        }

    }

    //ユーザー登録処理
    public function insertUserInfo($name, $phone, $password_hash, $birthday, $now, $login)
    {
        try {
            $statement = $this->pdo->prepare("INSERT INTO `user` (`name`, `phone`, `password`, `created_at`, `birthday`, `login_name`) VALUES (:name, :phone, :password,  :created_at, :birthday, :login_name)");
            $statement->bindValue(':name', $name);
            $statement->bindValue(':phone', $phone);
            $statement->bindValue(':password', $password_hash);
            $statement->bindValue(':birthday', $birthday);
            $statement->bindValue(':created_at', $now);
            $statement->bindValue(':login_name', $login);
            $statement->execute();

            $this->user_id = $this->pdo->lastInsertId();

        } catch (PDOException $e) {
            $timestamp = date("Y-m-d H:i:s");
            $msg = $e->getMessage();
            $logMsg = $timestamp . "-" . $msg;
            file_put_contents($this->logFile, $logMsg, FILE_APPEND);

        }

    }

    // ユーザーのアイコンをデーターベースに保存する
    public function insertUserIcon($icon, $user_id)
    {
        try {
            $statement = $this->pdo->prepare("UPDATE `user` SET  icon= :icon WHERE id = :id");
            $statement->bindValue(":icon", $icon);
            $statement->bindValue(":id", $user_id);
            $statement->execute();

        } catch (Exception $e) {
            $timestamp = date("Y-m-d H:i:s");
            $msg = $e->getMessage();
            $logMsg = $timestamp . "-" . $msg;
            file_put_contents($this->logFile, $logMsg, FILE_APPEND);
        }
    }
}