<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookUserInsert;
use sdf\hooks\invokers\base\SDFHookUserInvoker;

class SDFHookUserInsertInvoker extends SDFHookUserInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_USER_INSERT;
    }

    /**
     * @param SDFHookUserInsert $hook
     * @return mixed|void
     */
    protected function invokeHook($hook) {
        $hook->invokeUserInsert($this->entity);
    }
}