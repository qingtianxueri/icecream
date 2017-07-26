<?php

namespace sdf\utils;

use sdf\exceptions\SDFStringException;

class SDFStr {

    private static $strings = array();

    /**
     * Get a string.
     *
     * @param string $id ID of string
     * @param array $token Token replacement.
     * @throws SDFStringException
     * @return string
     * @see t()
     */
    public static function get($id, $token = array()) {
        if (!isset(self::$strings[$id])) {
            $e = 'String ID not found: ' . $id;
            throw new SDFStringException($e);
        }
        return t(self::$strings[$id], $token);
    }

    /**
     * Load a string file.
     *
     * @param string $name String file name. Format: string.$name.inc
     * @param string $module Module where the string stores.
     * @throws SDFStringException
     * @return void
     */
    public static function load($name, $module = 'sdf') {
        $path = drupal_get_path('module', $module);
        $path .= '/includes/strings/string.' . $name . '.inc';
        if (file_exists($path)) {
            $strings = array();
            require_once $path;
            self::$strings += $strings;
        } else {
            $e = 'String file not found: ' . $name;
            throw new SDFStringException($e);
        }
    }

    /**
     * Convert a string to a class style, ex: content_type => ContentType
     *
     * @param string $str
     *
     * @return string
     */
    public static function toClass($str) {
        $str = ucwords(str_replace('_', ' ', $str));
        $class = str_replace(' ', '', $str);
        return $class;
    }

}
