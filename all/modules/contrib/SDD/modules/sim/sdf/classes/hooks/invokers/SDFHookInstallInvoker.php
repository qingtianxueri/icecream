<?php


namespace sdf\hooks\invokers;


use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookInstall;
use sdf\hooks\invokers\base\SDFHookInvoker;

class SDFHookInstallInvoker extends SDFHookInvoker {

    /**
     * @param SDFHookInstall $hook
     * @return void
     */
    protected function invokeHook($hook) {
        $hook->invokeInstall();
    }

    protected function getHookName() {
        return SDFHookConsts::HOOK_INSTALL;
    }
}