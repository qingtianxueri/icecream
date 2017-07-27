<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookMenuAlter;
use sdf\hooks\invokers\base\SDFHookAlterInvoker;

class SDFHookMenuAlterInvoker extends SDFHookAlterInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_MENU_ALTER;
    }

    /**
     * @param SDFHookMenuAlter $hook
     * @return mixed
     */
    protected function invokeHook($hook) {
        return $hook->invokeMenuAlter($this->data);
    }
}