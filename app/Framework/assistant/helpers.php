<?php

/**
 * Get root path.
 * If onlyRoot is defined to true, path will be relative to public dir,
 * otherwise path will be relative with project root.
 *
 * @param bool $onlyRoot
 * @return mixed
 */
function root_dir($onlyRoot = true)
{
    if ($onlyRoot) {
        return $_SERVER['DOCUMENT_ROOT'];
    }

    return $_SERVER['DOCUMENT_ROOT'] . DS . '..' . DS;
}

/**
 * get a file from storage path.
 *
 * @param $file
 * @return string
 */
function storage($file)
{
    return root_dir(false) . 'storage' . DS . $file;
}

/**
 * get a file from storage path.
 *
 * @param $file
 * @return string
 */
function template($file)
{
    return root_dir(false) . 'templates' . DS . $file;
}

/**
 * Include file to a variable.
 *
 * @param $file
 * @return false|string
 */
function __include($file)
{
    ob_start();
    require(root_dir() . $file);
    return ob_get_clean();
}

/**
 * Dump and die.
 *
 * @param $content
 */
function dd($content)
{
    var_dump($content);
    die();
}

/**
 * A var_dump() with <pre> tag.
 *
 * @param $content
 */
function pre($content)
{
    echo '<pre>';
    var_dump($content);
    echo '</pre>';
}