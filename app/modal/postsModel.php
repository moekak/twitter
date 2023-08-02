<?php
require_once dirname(__FILE__) . "../../../reg/conf.php";
class postsModel
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

    //投稿のデータを取り出す
    public function getPostDate()
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM `board-table`");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            $timestamp = date("Y-m-d H:i:s");
            $msg = $e->getMessage();
            $logMsg = $timestamp . "-" . $msg;
            file_put_contents($this->logFile, $logMsg, FILE_APPEND);

        }

    }
}