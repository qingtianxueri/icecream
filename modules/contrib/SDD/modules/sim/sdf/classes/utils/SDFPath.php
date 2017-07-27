<?php

namespace sdf\utils;

use sdf\consts\SDFConst;
use sdf\exceptions\SDFPathException;

class SDFPath {

    /**
     * Get Drupal base path.
     *
     * @return string
     */
    public static function getBathPath() {
        return base_path();
    }

    /**
     * Get module relative path
     *
     * @param string $name Module name.
     *
     * @return string
     */
    public static function getMdoulePath($name = 'sdf') {
        return drupal_get_path('module', $name);
    }

    /**
     * Get theme relative path.
     *
     * @param string $name Theme name.
     *
     * @return string
     */
    public static function getThemePath($name) {
        return drupal_get_path('theme', $name);
    }

    /**
     * Get module absolute path.
     *
     * @param string $name Module name.
     *
     * @return string
     */
    public static function getModuleAbsolutePath($name = 'sdf') {
        return base_path() . '/' . self::getMdoulePath($name);
    }

    /**
     * Get theme absolute path.
     *
     * @param string $name Theme name.
     *
     * @return string
     */
    public static function getThemeAbsolutePath($name) {
        return base_path() . '/' . self::getThemePath($name);
    }

    /**
     * Get Drupal public file system path.
     *
     * @return string
     */
    public static function getPublicFileSystemPath() {
        return self::getFileSystemPath(SDFConst::FILE_SYSTEM_PUBLIC);
    }

    /**
     * Get Drupal private file system path.
     *
     * @return string
     */
    public static function getPrivateFileSystemPath() {
        return self::getFileSystemPath(SDFConst::FILE_SYSTEM_PRIVATE);
    }

    /**
     * Get Drupal file system path by uri.
     *
     * @param string $uri
     *     Drupal file system uri, a stream, referenced as "scheme://target".
     *     e.g. public://images refers to sites/default/files/images while sites/default/files is the default public file folder.
     * @throws SDFPathException
     * @return string
     */
    public static function getFileSystemPath($uri) {
        $instance = file_stream_wrapper_get_instance_by_uri($uri);
        if (empty($instance)) {
            $e = SDFStr::get('EXCEPTION_FILE_SYSTEM_NOT_FOUND', array(
                '!uri' => $uri
            ));
            throw new SDFPathException($e);
        }
        return $instance->realpath();
    }

}
