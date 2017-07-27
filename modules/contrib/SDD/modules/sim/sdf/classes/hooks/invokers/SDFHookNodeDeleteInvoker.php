<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookNodeDelete;
use sdf\hooks\invokers\base\SDFHookNodeInvoker;

class SDFHookNodeDeleteInvoker extends SDFHookNodeInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_NODE_DELETE;
    }

    /**
     * @param SDFHookNodeDelete $hook
     * @return mixed|void
     */
    protected function invokeHook($hook) {
        $hook->invokeNodeDelete($this->entity);
    }

}