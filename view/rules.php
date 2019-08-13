<?php         
    $url = "http://192.168.124.133:8889/reward/approval";
    $json = file_get_contents($url);
    $obj = json_decode($json);
    foreach($obj as $key => $value)
    {
        echo "<h2>".$key." ".$value."</h2>"."<br>";
    }  
?>  