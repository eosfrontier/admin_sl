<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);


    spl_autoload_register(
        function ( $classname ) {
            include "classes/class.$classname.php";
        }
    );
    if (!function_exists('str_contains')) {
        /**
         * Check if substring is contained in string
         *
         * @param $haystack
         * @param $needle
         *
         * @return bool
         */
        function str_contains($haystack, $needle)
        {
            return (strpos($haystack, $needle) !== false);
        }
    }
?>
