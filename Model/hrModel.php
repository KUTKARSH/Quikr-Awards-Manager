<?php
    
    class hrModel {
        public function getData()
        {
            
            $url = "http://192.168.124.133:8889/reward/hrview"; 
            $content=json_encode((object)null);
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
        //$obj = new hrModel();
        //$obj -> getData();
        public function sendData($data)
        {
            
            $url = "http://192.168.124.133:8889/reward/hrview/update"; 
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
            $result = file_get_contents( $url, false, $context );
        }
    }
                                 
?>