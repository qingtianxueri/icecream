<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookUserPresave;
use sdf\hooks\invokers\base\SDFHookUserInvoker;

class SDFHookUserPresaveInvoker extends SDFHookUserInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_USER_PRESAVE;
    }

    /**
     * @param SDFHookUserPresave $hook
     * @return mixed|void
     */
    protected function invokeHook($hook) {
        $hook->invokeUserPresave($this->entity);
    }
}