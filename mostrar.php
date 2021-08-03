<?php
function listarArchivos( $path ){
    echo '<h2>'.$path.'</h2>';
    // Abrimos la carpeta que nos pasan como parámetro
    $dir = opendir($path);
    // Leo todos los ficheros de la carpeta
    while ($elemento = readdir($dir)){
        // Tratamos los elementos . y .. que tienen todas las carpetas
        if( $elemento != "." && $elemento != ".."){
            // Si es una carpeta
            if( is_dir($path.$elemento) ){
                // Muestro la carpeta
                    listarArchivos($path.$elemento);
            // Si es un fichero
            } else {
                // Muestro el fichero
                var_dump($elemento);
                echo "<a href=".$path.'/'.$elemento.">". $elemento."<a/> <br/>";
            }
        }
    }
}
listarArchivos("./");
?>