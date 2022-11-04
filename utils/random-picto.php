<?php

    function get_random_picture($tableau){
        // retourne une valeur aleatoire du tableau
        $arrLength = count($tableau) - 1; 
        $random_value = rand()&$arrLength;

        return $tableau[$random_value];
    }

?>