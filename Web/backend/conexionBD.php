<?php
function dbConnect (){
    $servidor = "127.0.0.1"; 
    $base = "tip2doTest"; 
    $usuario = "root"; 
    $contrasenha = "toor"; // Cambialo por tu contraseña
    try {
        $db = new PDO('mysql:host='.$servidor.';dbname='.$base.';charset=utf8', $usuario,$contrasenha);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo '<p>Error conexion !!</p>';
        echo $e->getMessage();
        exit;
    }
    return $db;
 }
?>