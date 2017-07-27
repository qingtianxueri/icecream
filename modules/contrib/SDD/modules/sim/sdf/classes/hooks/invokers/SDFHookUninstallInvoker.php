<?php


namespace sdf\hooks\invokers;


use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookUninstall;
use sdf\hooks\invokers\base\SDFHookInvoker;

class SDFHookUninstallInvoker extends SDFHookInvoker {

    /**
     * @param SDFHookUninstall $hook
     * @return void
     */
    protected function invokeHook($hook) {
        $hook->invokeUninstall();
    }

    protected function getHookName() {
        return SDFHookConsts::HOOK_UNINSTALL;
    }
}