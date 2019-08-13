<?php
    
    class approveModel {
        public function getData()
        {
            
            $url = "http://192.168.124.133:8889/reward/approval"; 
            $content=json_encode(array("manager_id"=>$_SESSION['empid']));
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
    public function sendData($data)
    {
        $url = "http://192.168.124.133:8889/reward/approval/update"; 
        $content=json_encode($data);
        $options = array(
        'http' => array(
        'method'  => 'POST',
        'content' => $content,
        'header'=>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n"
        )   
        );

        $context  = stream_context_create( $options );
        $result = json_decode(file_get_contents( $url, false, $context ));
        if($result->check==-1)
        {
            echo "<script> alert(\"Only 5 approvals per month are allowed\") </script>";
        }
        
        }
    }
?>
