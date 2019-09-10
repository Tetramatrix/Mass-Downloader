<?php

     /* Copyright (C) Chi Hoang - All Rights Reserved
      * Unauthorized copying of this file, via any medium is strictly prohibited
      * Proprietary and confidential
      * Written by Chi Hoang <chibox@gmail.com>, Februar 2016
      */

class Massdownload {
    
    function download() {
    
        $file = $_GET['file'];
        $path = $_GET['path'];
        $url = $path == "" ? $file : $path.$file;
    
        if(file_exists($url))
        {
            header('HTTP/1.1 200 OK');
            header('Content-Description: File Transfer');
            header('Content-Type: application/force-download');
            header("Content-Disposition: attachment;
    filename=\"".basename($url)."\";");
            header('Content-Length: ' . filesize($url));
            header("Content-Transfer-Encoding: binary");
            header("Cache-Control: no-cache, must-revalidate");
            header("Cache-control: private");
            header("Pragma: no-cache");
            header("Expires: 0");
            readfile($url);
    
        } else
        {
            header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
            header("Last-Modified: ".gmdate( "D, d M Y H:i:s")."GMT");
            header("Cache-Control: no-cache, must-revalidate");
            header("Pragma: no-cache");
            echo $file;
        } 
    }
}

$obj = new Massdownload();
$obj->download();