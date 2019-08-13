<?php
    require_once __DIR__.'/vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
   
    $data="hello";
    $mpdf -> WriteHTML($data);
    $mpdf -> Output('myfile.pdf','D');



?>