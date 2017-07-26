<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookAdminPathsAlter;
use sdf\hooks\invokers\base\SDFHookAlterInvoker;

class SDFHookAdminPathsAlterInvoker extends SDFHookAlterInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_ADMIN_PATH_ALTER;
    }

    /**
     * @param SDFHookAdminPathsAlter $hook
     * @return void
     */
    protected function invokeHook($hook) {
        $hook->invokeAdminPathsAlter($this->data);
    }
}