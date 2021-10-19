<?php
include_once "conex.php";


if (isset($_POST['uploadBtn'])) {
    $codigo = $_POST["codigo"];
}

foreach ($_FILES['archive']['tmp_name'] as $key => $tmp_name) {
    if ($_FILES['archive']['tmp_name'][$key]) {

        $filename = basename($_FILES['archive']['name'][$key]);
        $temporal = $_FILES['archive']['tmp_name'][$key];
        $keyImg = $key;
        #Valor del directorio puede ser modificado en esta variable
        $directory = "images/";
        #Obtenemos la dirección IP del usuario
        $ip = (isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
        $visible = isset($_POST['visible']) ? 1 : 0;

        #Verificamos la existencia del directorio para guardar las imagenes
        #si no existe lo creamos.
        if (!file_exists($directory)) {
            mkdir($directory, 0777);
        }


        $dir = opendir($directory);
        $md5name = strtoupper(md5($filename));
        $type = pathinfo($temporal, PATHINFO_EXTENSION);
        $route = $directory . $md5name;
        #Codificamos la imagen
        $img = base64_encode(file_get_contents($route, $type));

        #validamos que se movió la imagen al directorio y guardamos la información en la BD
        if (move_uploaded_file($temporal, $route)) {
            $sql = $conn->prepare("INSERT INTO imgupload VALUES (?,?,?,?,?,?);");
            $result = $sql->execute([$codigo, $keyImg, $md5name, $img, $visible, $ip]);
            #execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
            #Con eso podemos evaluar
            header("location: ../index.php");
        } else {
            echo "Algo salió mal. Verificar que la tabla exista";
        }

        closedir($dir);
    }
}
