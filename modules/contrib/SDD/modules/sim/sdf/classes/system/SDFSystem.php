<?php

namespace sdf\system;

use sdf\exceptions\SDFAutoLoadException;

class SDFSystem {

    /**
     * Modules registered to SDF
     *
     * @var array of SDFModule
     */
    private $registeredModules = array();

    private static $instance = NULL;

    public static function instance() {
        if (self::$instance == NULL) {
            self::$instance = new SDFSystem();
        }
        return self::$instance;
    }

    /**
     * @return array<SDFModule>
     */
    public function getRegisteredModules(){
        return $this->registeredModules;
    }

    public function registerModule(SDFModule $module){
        $this->registeredModules[] = $module;
    }

    /**
     * Methods for PHP classes autoload, registered for SPL autoload.
     *
     * @param string $namespace
     * @throws SDFAutoLoadException
     */
    public static function autoload($namespace){
        $names = explode('\\', $namespace);
        if (!$names[0]) {
            $message = "Invalid namespace $namespace.";
            throw new SDFAutoLoadException($message);
        }

        $module = $names[0];
        $module_path = drupal_get_path('module', $module);
        if (empty($module_path)) {
            return;
        }

        $classPath = $module_path . '/classes';
        for ($i = 1; $i < count($names); $i ++) {
            $classPath .= '/' . $names[$i];
        }
        $classPath  .= '.php';

        if (!file_exists($classPath)) {
            $message = "Class path $classPath does not exist. ($namespace)";
            throw new SDFAutoLoadException($message);
        }

        require_once $classPath;

        if (!class_exists($namespace) && !interface_exists($namespace)) {
            $message = "Class $namespace does not exist. ($namespace)";
            throw new SDFAutoLoadException($message);
        }
    }
}