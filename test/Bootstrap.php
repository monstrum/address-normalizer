<?php
/**
 * Limit the memory size to a common used value
 */
ini_set('memory_limit', '384M');

/**
 * Set error reporting to the level to which Zend Framework code must comply.
 */
error_reporting(E_ALL | E_STRICT);

/**
 * Explicit print out php startup and runtime errors
 */
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

/**
 * Set the default timezone
 */
date_default_timezone_set('Europe/Berlin');

/**
 * vendor autoloader
 */
$autoloader = __DIR__ . '/../vendor/autoload.php';
if (is_file($autoloader)) {
    include $autoloader;
}

/**
 * Set the include path.
 */
set_include_path(
    implode(
        PATH_SEPARATOR,
        array(
            __DIR__,
            get_include_path(),
        )
    )
);

/**
 * Setup the autoloader
 */
spl_autoload_register(
    function ($sClass) {
        $sFilename = str_replace(array('\\', '_'), DIRECTORY_SEPARATOR, $sClass) . '.php';
        if (false === ($sRealpath = stream_resolve_include_path($sFilename))) {
            return false;
        }
        return include_once $sRealpath;
    }
);

