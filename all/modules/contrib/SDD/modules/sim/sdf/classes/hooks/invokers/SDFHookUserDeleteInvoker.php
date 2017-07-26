<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookUserDelete;
use sdf\hooks\invokers\base\SDFHookUserInvoker;

class SDFHookUserDeleteInvoker extends SDFHookUserInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_USER_DELETE;
    }

    /**
     * @param SDFHookUserDelete $hook
     * @return mixed|void
     */
    protected function invokeHook($hook) {
        $hook->invokeUserDelete($this->entity);
    }
}