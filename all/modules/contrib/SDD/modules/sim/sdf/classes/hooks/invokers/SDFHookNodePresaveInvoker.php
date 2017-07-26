<?php


namespace sdf\hooks\invokers;


use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookNodePresave;
use sdf\hooks\invokers\base\SDFHookNodeInvoker;

class SDFHookNodePresaveInvoker extends SDFHookNodeInvoker {

    /**
     * @return String return a hook name in HookNameConsts
     */
    protected function getHookName() {
        return SDFHookConsts::HOOK_NODE_PRESAVE;
    }

    /**
     * @param SDFHookNodePresave $hook
     * @return mixed|void
     */
    protected function invokeHook($hook) {
        $hook->invokeNodePresave($this->entity);
    }
}