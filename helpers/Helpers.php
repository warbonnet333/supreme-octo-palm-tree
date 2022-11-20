<?php

class Helpers {
    // remove duplicates by the key
    public static function unique_multidim_array(array $array, string $key): array
    { 
        $temp_array = array(); 
        $i = 0; 
        $key_array = array(); 
        
        foreach($array as $val) { 
            if (isset($val[$key]) && $val[$key] && !in_array($val[$key], $key_array)) { 
                $key_array[$i] = $val[$key]; 
                $temp_array[] = $val; 
            }
            $i++; 
        } 
        
        return $temp_array;
    }


    // remove emoty and nullish tags arrays
    public static function isseted_child_array(array $array, string $key): array
    { 
        $temp_array = array(); 
        $i = 0; 
        
        foreach($array as $val) { 
            if (isset($val[$key]) && is_array($val[$key]) && $val[$key]) { 
                $temp_array[] = $val; 
            } 
            $i++; 
        }

        return $temp_array; 
    }

    // sotr items be key (title)
    public static function sort_by_key(array $array, string $keyName): array 
    { 
        $temp_array = array();
        $res = $array;

        foreach ($res as $key => $val){
            $temp_array[$key] = $val[$keyName];
        }

        array_multisort($temp_array, SORT_ASC, $res);

        return $res; 
    }
}