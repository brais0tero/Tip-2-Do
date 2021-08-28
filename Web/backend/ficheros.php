<?php 

        $str = file_get_contents("./JSON/movie_ids.json");
         $str = str_replace("\xEF\xBB\xBF",'',$str); 
        $array = json_decode($str, true);
       
        var_dump($array); 

?>