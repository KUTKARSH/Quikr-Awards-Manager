<?php
    include_once("Model/patModel.php");
    include_once("view/patView.php");
    class patController
    {
        public $model;
        public function __construct()
        {
            $this->model = new patModel();
        }
        public function invoke()
        { 
            $result = $this->model->getUser();
            //echo $result;
        }
    }
?>