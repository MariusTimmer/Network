<?php

/**
 * This script is just meant to include the autoloader which includs required
 * classes from the projects classes directory. The class names should be
 * written using camel case. But the autoloader will only include files which
 * names are written in lower case. The autoloader will search for a matching
 * file in the directories given in the "$directories"-array.
 * @date 2017-03-24
 * @since 0.1
 * @author Marius Timmer
 */

/**
 * Autoloader to load required classes from one of the classes directories.
 * @param String $classname Name of the required class
 * @return Boolean True on success or false
 */
function __autoload($classname) {
    $directory_prefix = __DIR__ . DIRECTORY_SEPARATOR;
    $directories = array(
        'classes',
        'classes'. DIRECTORY_SEPARATOR .'guielements'
    );
    foreach ($directories AS $directory) {
        $filename = $directory_prefix . $directory . DIRECTORY_SEPARATOR . strtolower($classname) .'.php';
        if (file_exists($filename)) {
            require_once($filename);
            return true;
        }
    }
    return false;
}
