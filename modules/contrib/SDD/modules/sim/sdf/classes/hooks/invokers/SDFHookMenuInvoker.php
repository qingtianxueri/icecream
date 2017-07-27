<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookMenu;
use sdf\hooks\invokers\base\SDFHookListInvoker;
use sdf\system\SDFModule;

class SDFHookMenuInvoker extends SDFHookListInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_MENU;
    }

    /**
     * @param SDFHookMenu $hook
     * @return mixed
     */
    protected function invokeHook($hook) {
        return $hook->invokeMenu();
    }

    /**
     * For hook menu, the file path of the menu item is default set to the module path.
     * In SDF, the module is always the main module "sdf", so here is to override the
     * file path to the module being invoked. <br>
     *
     * From Drupal API:<br>
     * -"<b>file</b>": A file that will be included before the page callback is called;
     *  this allows page callback functions to be in separate files.
     *  The file should be relative to the implementing module's directory unless
     *  otherwise specified by the "file path" option. Does not apply to other callbacks (only page callback).<br>
     * -"<b>file path</b>": The path to the directory containing the file specified in "file".
     *  This defaults to the path to the module implementing the hook.
     *
     * @param array $results
     * @param SDFModule $module
     */
    protected function onInvokeResults(&$results, SDFModule $module) {
        parent::onInvokeResults($results, $module);

        $modulePath = drupal_get_path('module', $module->getName());
        foreach ($results as $path => &$item) {
            $item['file path'] = $modulePath;
        }
    }

}