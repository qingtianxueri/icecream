<?php

namespace sdf\structs;

abstract class SDFStruct {

    protected $module;

    public function __construct() {

    }

    public function setModule($module) {
        $this->module = $module;
    }

    /**
     * Create any struct.
     */
    public abstract function createStruct();

    /**
     * Check the requirements before creating structs.
     */
    protected abstract function requirement();

}