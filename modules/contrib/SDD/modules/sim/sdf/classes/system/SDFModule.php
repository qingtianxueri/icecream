<?php

namespace sdf\system;

use sdf\hooks\interfaces\SDFHook;

abstract class SDFModule {

    /**
     * Get the name of the module
     *
     * @return string
     */
    abstract function getName();

    /**
     * Get the impl of the hook
     *
     * @param $hookName
     * @return SDFHook
     */
    abstract function getHook($hookName);

}