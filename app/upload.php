<?php
include_once("conex.php");
//(new Connection())->ConnectionBD();
var_dump($_FILES["archive"]);

foreach ($_FILES['archive']['tmp_name'] as $key => $tmp_name) {
    if ($_FILES['archive']['tmp_name'][$key]) {

        $filename = basename($_FILES['archive']['name'][$key]);
        //echo $tipo = strtolower(pathinfo($filename, PATHINFO_BASENAME));
        $temporal = $_FILES['archive']['tmp_name'][$key];
        echo $keyImg = $key;
        $directory = "images/";

        if (!file_exists($directory)) {
            mkdir($directory, 0777);
        }

        $dir = opendir($directory);
        $md5name = strtoupper(md5($filename));

        $route = $directory . '/' . $md5name;

        if (move_uploaded_file($temporal, $route)) {
            echo "Ok";
        } else {
            echo "error";
        }

        closedir($dir);
    }
}
