<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookNodeUpdate;
use sdf\hooks\invokers\base\SDFHookNodeInvoker;

class SDFHookNodeUpdateInvoker extends SDFHookNodeInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_NODE_UPDATE;
    }

    /**
     * @param SDFHookNodeUpdate $hook
     * @return mixed|void
     */
    protected function invokeHook($hook) {
        $hook->invokeNodeUpdate($this->entity);
    }

}