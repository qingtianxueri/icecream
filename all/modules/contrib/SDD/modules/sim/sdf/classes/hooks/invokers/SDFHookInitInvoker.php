<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookInit;
use sdf\hooks\invokers\base\SDFHookInvoker;

class SDFHookInitInvoker extends SDFHookInvoker{

    protected function getHookName() {
        return SDFHookConsts::HOOK_INIT;
    }

    /**
     * @param SDFHookInit $hook
     * @return void
     */
    protected function invokeHook($hook) {
        $hook->invokeInit();
    }
}