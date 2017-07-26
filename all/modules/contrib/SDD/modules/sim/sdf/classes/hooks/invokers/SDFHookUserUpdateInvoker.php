<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookUserUpdate;
use sdf\hooks\invokers\base\SDFHookUserInvoker;

class SDFHookUserUpdateInvoker extends SDFHookUserInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_USER_UPDATE;
    }

    /**
     * @param SDFHookUserUpdate $hook
     * @return mixed|void
     */
    protected function invokeHook($hook) {
        $hook->invokeUserUpdate($this->entity);
    }
}