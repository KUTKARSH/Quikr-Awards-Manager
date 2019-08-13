<?php
    include_once("Model/hrModel.php");
    class hrController 
    {
        public $model;
        public function __construct()
        {
            $this->model = new hrModel();
        }
        public function invoke()
        {
            if(isset($_REQUEST["approve"]))
            {
                $id = $_REQUEST["approve"];
                $rid=(int)$id;
                $data=array("row_id"=>$rid,"status"=>"3");
                $this->model->sendData($data);
            }
            $result = $this->model->getdata();
            include "view/hrView.php";
        }
               
    }
?>