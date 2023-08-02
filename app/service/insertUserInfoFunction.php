<?php
 require_once(dirname(__FILE__) . "../../modal/userModel.php");
 require_once(dirname(__FILE__) . "../../service/createRandomNumFunction.php");

 class insertUserInfoFunction{
    public $model;
    public $function;
    public $filename;
    public $imagePath;

    public function __construct()
    {
        $this->model = new userModel();
        $this->function = new createRandomNumFunction();
        
    }

    public function insertIcon(){
        if($_FILES["icon"] && $_FILES["icon"]["tmp_name"]){
            if (!file_exists("../../assets/iconImg")) {
                mkdir("../../assets/iconImg");
            }
            $this->filename = $this->function->randomString(8) . "/" . $_FILES["icon"]["name"];
            $this->imagePath = "../../assets/iconImg/";

            mkdir(dirname($this->imagePath. $this->filename));
            move_uploaded_file($_FILES["icon"]["tmp_name"], $this->imagePath. $this->filename);

            $this->model->insertUserIcon($this->filename, $_POST["user_id"]);

            header("Location: ../../view/index.php");
            
        }
    }
 }
