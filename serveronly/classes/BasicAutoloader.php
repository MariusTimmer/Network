<?php

/**
 * This script is just meant to include the autoloader which includes required
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
 */
class BasicAutoloader {

    /**
     * Loading method which will check the directories for the requested class.
     * @param string $classname Name of the requested class
     * @return bool True on success or false
     */
    public static function load(string $classname) {
        $directory_prefix = __DIR__ . DIRECTORY_SEPARATOR;
        $directories = array(
            '',
            'database'. DIRECTORY_SEPARATOR,
            'guielements'. DIRECTORY_SEPARATOR
        );
        foreach ($directories AS $directory) {
            $filename = $directory_prefix . $directory . $classname .'.php';
            if (file_exists($filename)) {
                require_once($filename);
                return true;
            }
        }
        return false;
    }

}

/**
 * Register the just defined basic autoloader to the spl stack.
 */
spl_autoload_register(
    [
        BasicAutoloader::class,
        'load'
    ]
);
