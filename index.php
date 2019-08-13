<?php
    //echo "hello";
    //include_once("Controller/patController.php");
    //$controller = new patController();
    //$controller->invoke();
    //$url = isset($_GET['url'])?$_GET['url']:"/";
    //echo $url
    session_start();
    $url = isset($_SERVER['PATH_INFO'])?explode('/',ltrim($_SERVER['PATH_INFO'],'/')):[];
    $controller=(isset($url[0])&&$url[0]!='')?($url[0]):'login_controller';
    $controller_name=$controller;
    array_shift($url);    
    //$action=(isset($url[0])&&$url[0]!='')?$url[0]:'';
    //$action_name=$controller;
    //echo $controller."<br>";
    //echo $action."<br>";
    //var_dump($url);
   // echo $controller;
    //$controllersPath = "Controller/".$controller.".php";
    //echo $controller;
    if($controller=='login_controller')
    {
        include_once("Controller/login_controller.php");
        $controller1 = new login_controller();
        $controller1->invoke();
    }
    else if($controller=='patController.php')
    {
        include_once("Controller/patController.php");
        $controller1 = new patController();
        $controller1->invoke();
    }
    else if($controller=='approveController.php')
    {
        include_once("Controller/approveController.php");
        $controller1 = new approveController();
        $controller1->invoke();
    }
    else if($controller=="hrController.php")
    {
        include_once("Controller/hrController.php");
        $controller1 = new hrController();
        $controller1->invoke();
    }
?>