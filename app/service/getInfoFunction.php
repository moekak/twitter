<?php
require_once dirname(__FILE__) . "../../modal/joinModel.php";


class GetInfoFunction
{

    public $model;
    public function __construct()
    {
       $this->model = new JoinModel();
    }

    // データを取り出す処理
    public function getPostData()
    {
         return $this->model->join();

    }

}