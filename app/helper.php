<?php

// Important functions
if (!function_exists('pr')) {
    function pr($arr)
    {
        echo '<pre>';
        print_r($arr);
    }
}
if (!function_exists('prx')) {
    function prx($arr)
    {
        echo '<pre>';
        print_r($arr);
        die();
    }
}
if (!function_exists('get_formatted_date')) {
    function get_formatted_date($date,$format)
    {
        $formattedDate = date($format,strtotime($date));
        return $formattedDate;
    }
}
