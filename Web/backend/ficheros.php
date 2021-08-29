<?php 
ini_set('memory_limit', '1024M');
        $str = file_get_contents("./JSON/movie_ids.json");
        $array = json_decode($str);
        $len = count($array);
        $firsthalf = array_slice($array, 0, $len / 2);
        $secondhalf = array_slice($array, $len / 2);
if (isset($_GET["obtenerPeliculas"])){
        if($_GET["obtenerPeliculas"]==0)
        {
        echo(json_encode($firsthalf));
        }
        else if($_GET["obtenerPeliculas"]==1)
        {
                echo(json_encode($secondthalf));
        }
}

?>