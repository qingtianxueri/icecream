<?php
/**
 * User: taoyuanjian
 * Date: 07/02/14
 * Time: 10:25
 */

namespace sdf_example;

use sdf\hooks\interfaces\SDFHook;
use sdf\system\SDFModule;
use sdf\consts\SDFHookConsts;

use sdf_example\hookimpls\SDFExampleHookBlockImpl;
use sdf_example\hookimpls\SDFExampleHookInitImpl;
use sdf_example\hookimpls\SDFExampleHookMenuImpl;
use sdf_example\hookimpls\SDFExampleHookFormAlterImpl;
use sdf_example\hookimpls\SDFExampleHookNodeImpl;

class SDFExampleModule extends SDFModule {

    /**
     * Get the name of the module
     *
     * @return string
     */
    function getName() {
        return 'sdf_example';
    }

    /**
     * @param $hookName
     * @return SDFHook
     */
    function getHook($hookName){
        switch ($hookName){
            case SDFHookConsts::HOOK_INIT:
                return new SDFExampleHookInitImpl();

            case SDFHookConsts::HOOK_MENU:
                return new SDFExampleHookMenuImpl();

            case SDFHookConsts::HOOK_BLOCK_INFO:
            case SDFHookConsts::HOOK_BLOCK_VIEW:
                return new SDFExampleHookBlockImpl();

            case SDFHookConsts::HOOK_NODE_INSERT:
            case SDFHookConsts::HOOK_NODE_UPDATE:
            case SDFHookConsts::HOOK_NODE_DELETE:
            case SDFHookConsts::HOOK_NODE_PRESAVE:
                return new SDFExampleHookNodeImpl();

            case SDFHookConsts::HOOK_FORM_ALTER:
                return new SDFExampleHookFormAlterImpl();
        }
        return NULL;
    }

}