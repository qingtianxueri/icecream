<?php


namespace classes;


use sdf\hooks\interfaces\SDFHook;
use sdf\system\SDFModule;

class SDDCoreModule extends SDFModule {

    /**
     * Get the name of the module
     *
     * @return string
     */
    function getName() {
        return 'sdd_core';
    }

    /**
     * Get the impl of the hook
     *
     * @param $hookName
     * @return SDFHook
     */
    function getHook($hookName) {

    }
}