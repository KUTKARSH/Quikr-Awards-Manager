<?php
    include_once("Model/approveModel.php");
    
    class approveController 
    {
        public $model;
        public function __construct()
        {
            $this->model = new approveModel();
        }
        public function invoke()
        {
            if(isset($_REQUEST["uniqueId"]) && (isset($_REQUEST["approve"]) || isset($_REQUEST["reject"]))) {
                $id = $_REQUEST["uniqueId"];
                //$GLOBALS['cnt']=1;
                $id=(int)$id;
                $status=0;
                if(isset($_REQUEST['approve']))
                    $status = 1;
                if(isset($_REQUEST['reject']))
                    $status = 2;
                if($status!=0){
                    $data = array("row_id"=>$id,"status"=>$status);
                    $this->model->sendData($data);
                }
            }
            $result=$this->model->getData();
            //print_r($result);
            include "view/approveView.php"; 
            
        }
    }
?>