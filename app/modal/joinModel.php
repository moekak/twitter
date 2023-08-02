<?php
require_once dirname(__FILE__) . "../../../reg/conf.php";


class JoinModel
{
    public $pdo;
    public $logFile = LOG_FILE_MODEL;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(DSN, USER, PASS);

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }

    }

    // テーブル結合の処理
    public function join()
    {
       

        try {
            $statement = $this->pdo->prepare("SELECT * FROM `user` INNER JOIN `board-table` ON `user`.`id` = `board-table`.`user_id` ORDER BY `board-table`.`created_at` DESC;");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            $timestamp = date("Y-m-d H:i:s");
            $msg = $e->getMessage() .PHP_EOL;
            $logMsg = $timestamp . "-" . $msg;
            file_put_contents($this->logFile, $logMsg, FILE_APPEND);

        }

    }

}