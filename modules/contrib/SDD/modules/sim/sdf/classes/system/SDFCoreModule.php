<?php


namespace sdf\system;


use sdf\consts\SDFHookConsts;
use sdf\hooks\hookimpls\SDFCoreHookMenuImpl;
use sdf\hooks\interfaces\SDFHook;

class SDFCoreModule extends SDFModule {

    /**
     * Get the name of the module
     *
     * @return string
     */
    function getName() {
        // SDFCoreModule stands for sdf itself, there is no "sdf_core".
        return 'sdf';
    }

    /**
     * Get the impl of the hook
     *
     * @param $hookName
     * @return SDFHook
     */
    function getHook($hookName) {
        switch ($hookName) {
            case SDFHookConsts::HOOK_MENU:
                return new SDFCoreHookMenuImpl();
        }
    }
}