<?php

namespace sdf\structs;

use sdf\consts\SDFConst;
use sdf\exceptions\SDFStructException;
use sdf\utils\SDFStr;

class SDFFolderStruct extends SDFStruct {

    /**
     * The root folder that contains the module.
     *
     * @var string
     */

    protected $root;

    public function __construct() {
        $this->root = SDFConst::ROOT_PROJECT;
    }

    public function setRoot($root) {
        $this->root = $root;
    }

    protected function requirement() {
        // Root must exist.
        if (!$this->rootExists()) {
            $e = SDFStr::get('EXCEPTION_PROJECT_FOLDER_NOT_FOUND', array('!folder' => $this->root));
            throw new SDFStructException($e);
        }
        // Module must be specified.
        if (empty($this->module)) {
            $e = SDFStr::get('EXCEPTION_PROJECT_MODULE_NOT_SET');
            throw new SDFStructException($e);
        }
    }

    /**
     * Create complete folder structure for the module.
     *
     * @throws SDFStructException
     */
    public function createStruct() {
        $this->requirement();

        $folders = array(
            // Module folder
            $this->module,
            // Classes folders
            $this->module . '/classes',
            $this->module . '/classes/consts',
            $this->module . '/classes/entities',
            $this->module . '/classes/entities/base',
            $this->module . '/classes/entities/nodes',
            $this->module . '/classes/entities/terms',
            $this->module . '/classes/entities/users',
            $this->module . '/classes/business',
            $this->module . '/classes/business/nodes',
            $this->module . '/classes/business/terms',
            $this->module . '/classes/business/users',
            $this->module . '/classes/hookimpls',
            $this->module . '/classes/hookimpls/tasks',
            // Includes folders
            $this->module . '/includes',
            $this->module . '/includes/forms',
            $this->module . '/includes/pages/',
            $this->module . '/includes/strings',
            $this->module . '/includes/temp',
            $this->module . '/includes/tests',
            $this->module . '/includes/themes',
            $this->module . '/includes/js',
            $this->module . '/includes/css',
            // Unit test folder
            $this->module . '/tests',
            // Update folder
            $this->module . '/updates',
        );
        foreach ($folders as $folder) {
            $this->createFolder($folder);
        }
    }

    private function rootExists() {
        return file_exists($this->root);
    }

    private function createFolder($name) {
        $folder = SDFConst::ROOT_PROJECT . '/' . $name;
        if (file_exists($folder)) {
            return TRUE;
        }
        $ok = mkdir($folder);
        if (!$ok) {
            $e = SDFStr::get('EXCEPTION_PROJECT_FOLDER_CREATION_FAILURE', array('!folder' => $folder));
            throw new SDFStructException($e);
        }
        return TRUE;
    }

}
