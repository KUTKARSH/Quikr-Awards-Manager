<?php

class patModel {
public function getUser()
{ 
    

    if(isset($_REQUEST['email']) && isset($_REQUEST['desc'])){
    $data=array("recipient_email"=>$_REQUEST['email'],"proposer_email"=> $_SESSION["uname"],"salutation"=>$_REQUEST['desc'],"certificateType"=>$_REQUEST['category']);
    $content=json_encode($data);
    $url = "http://192.168.80.162:8080/reward/prposer";    
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
    //echo $result;
    $response = json_decode( $result );
    if($response->man_id==-1)
    {
       echo "<script> alert(\"No such recipient exists\") </script>";
      //header('Location: http://192.168.64.2/project/view/recinotexist.php');
    }
    else if($response->man_id==-2)
    {
      echo "<script> alert(\"User can't propose to itself\") </script>";
      //header('Location: http://192.168.64.2/project/view/same.php');
    }
    else if($response -> man_id == -3)
    {
        echo "<script> alert(\"Limit Reached\") </script>";
    }
    else
    return $response->email;
    //return $_SESSION['username'];
    
}
}
}
?>
        