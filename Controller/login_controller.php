<?php
    include_once("Model/login_model.php");
    class login_controller 
    {
        public $model;
        public function __construct()
        {
            $this->model = new login_model();
        }
        public function invoke()
        {
            $res = $this->model->getlogin();
            if(empty($res)){
                include 'view/login.php';
            }else{
            $_SESSION['post'] = $res->desig;
            $_SESSION['empid']=$res->emp_id;
            //echo $res->emp_id;
            if($res->emp_id==-1)
            {
                header('Location: http://192.168.64.2/project/view/notexist.php');
            }
            if($res->desig=='manager')
            {
                    header('Location: http://192.168.64.2/project/approveController.php');
                    //include_once("Controller/approveController.php");
                    $controller1 = new approveController();
                    $controller1->invoke();
            }
            else if($res->desig=='HR')
            {
                    header('Location: http://192.168.64.2/project/hrController.php');
                    //include_once("Controller/hrController.php");
                    $controller1 = new hrController();
                    $controller1->invoke();
            }
            else if($res->desig=='employee')
            {       
                    header('Location: http://192.168.64.2/project/patController.php');

                    // include_once("Controller/patController.php");
                    $controller1 = new patController();
                    $controller1->invoke();
            }
        }
        }
    }
?>