<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookNodeInsert;
use sdf\hooks\invokers\base\SDFHookNodeInvoker;
use sdf\utils\SDFLog;

class SDFHookNodeInsertInvoker extends SDFHookNodeInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_NODE_INSERT;
    }

    /**
     * @param SDFHookNodeInsert $hook
     * @return mixed|void
     */
    protected function invokeHook($hook) {
        $hook->invokeNodeInsert($this->entity);
    }

}