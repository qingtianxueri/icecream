<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookBlockInfo;
use sdf\hooks\invokers\base\SDFHookListInvoker;

class SDFHookBlockInfoInvoker extends SDFHookListInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_BLOCK_INFO;
    }

    /**
     * @param SDFHookBlockInfo $hook
     * @return mixed
     */
    protected function invokeHook($hook) {
        return $hook->invokeBlockInfo();
    }
}