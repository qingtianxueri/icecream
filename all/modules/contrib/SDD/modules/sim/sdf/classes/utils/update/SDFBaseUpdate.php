<?php

namespace sdf\utils\update;

abstract class SDFBaseUpdate {

    private $module;
    private $version;

    public function __construct($module, $version) {
        $this->module = $module;
        $this->version = $version;
    }

    /**
     * Update process starts.
     */
    public abstract function update();

    /**
     * Validate the requirement before starting the update.
     * e.g. required module is enabled or not.
     * Failure validation should throw SDFUpdateException.
     */
    public abstract function validate();

    protected function requireModule($module) {
        return module_exists($module);
    }

    protected function requireFolder($folder) {
        $path = $this->getUpdatePath($folder);
        return file_exists($path);
    }

    /**
     * Vaildate the file extension
     *
     * @param string $source File path
     * @param array $allowedExtensions Array for allowed extensions.
     * @return boolean
     */
    protected function validExtension($source, array $allowedExtensions) {
        $ext = pathinfo($source, PATHINFO_EXTENSION);
        if (in_array($ext, $allowedExtensions)) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Validate if the file content is empty.
     *
     * @param string $source File path
     *
     * @return boolean FALSE if empty.
     */
    protected function validContent($source) {
        $content = file_get_contents($source);
        if (empty($content)) {
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Get the path to the folder in /updates/.
     *
     * @param string $name Sub folder.
     *
     * @return string
     */
    protected function getUpdatePath($name) {
        return drupal_get_path('module', $this->module) . '/updates/' . $this->version . '/' . $name . '/';
    }

    /**
     * Scan contents in the update folder.
     *
     * @param string $name Sub folder.
     *
     * @return array
     */
    protected function scanDir($name) {
        $path = $this->getUpdatePath($name);
        $dir = scandir($path);
        // Remove useless "." and "..".
        unset($dir[0]);
        unset($dir[1]);
        // Remove the famous and annoying '.svn' folder.
        $key = array_search('.svn', $dir);
        if ($key !== FALSE) {
            unset($dir[$key]);
        }
        return $dir;

    }

    public function getModule() {
        return $this->module;
    }

    public function setModule($module) {
        $this->module = $module;
    }

    public function getVersion() {
        return $this->version;
    }

    public function setVersion($version) {
        $this->version = $version;
    }
}
