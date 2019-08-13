<?php
    include_once("Controller/encrypt.php");
    class login_model {
        public function getlogin()
        {
                $data="QuikrAwardsManager";
                $key="otr4POfj7gjPgBzm";
                $encryptedData="Basic ". my_encrypt($data,$key);
                $url ="http://accounts-stage.quikr.com:13000/identity/v1/auth"
                . "?auth=" . $encryptedData . "&clientId=" . "QuikrAwardsManager" . "&redirectUri=" . "http://192.168.64.2/project/" . "&responseType=code&scope=openid";
                $url=urlencode($url);
            $result=file_get_contents($url);
            //echo $result;
                $ch = curl_init($url); // such as http://example.com/example.xml
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $data = curl_exec($ch);
                curl_close($ch);
            }
            /*$response = array();
            if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
                $user = array("emp_mail"=>$_REQUEST['username'],"password"=>$_REQUEST['password']);
                $_SESSION['uname'] = $_REQUEST['username'];
                $jsonObj=json_encode($user);
                $url = "http://192.168.124.133:8889/reward/login"; 
                $content=$jsonObj;
                $options = array(
                'http' => array(
                'method'  => 'POST',
                'content' => $content,
                'header'=>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n"
                )
            );
            $context  = stream_context_create( $options );
            $result = file_get_contents( $url, false, $context );
            $response = json_decode( $result );  
            return $response;
            }
    }}*/
    //$obj=new login_model();
    //$obj->getlogin();
}}
?>