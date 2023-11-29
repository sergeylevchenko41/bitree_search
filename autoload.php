<?php

spl_autoload_register(
/**
 * @throws \RuntimeException
 */ static function ($class) {
    // project-specific namespace prefix
    $prefix = 'BiTreeSearch\\';

    // base directory for the namespace prefix
    // Change Constant name SD_PLUGIN_PLUGIN_VERSION_ROOT

    $base_dir = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require_once $file;
    } else {
        throw new RuntimeException(sprintf('Class %s not found', $relative_class));
    }
}
);
