<?php 

ini_set('memory_limit', '1024M');
if(isset($_GET["pelis"])){
         $array = json_decode(file_get_contents('./JSON/movie_ids.json'), true);
        echo (json_encode($array));
        $array = null;
}
if(isset($_GET["series"])){
        $array = json_decode(file_get_contents('./JSON/tv_ids.json'), true);
       echo (json_encode($array));
       $array = null;
}      
?>