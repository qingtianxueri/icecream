<?php


namespace sdf\hooks\invokers;


use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookSchema;
use sdf\hooks\invokers\base\SDFHookListInvoker;

class SDFHookSchemaInvoker extends SDFHookListInvoker {

    /**
     * @param SDFHookSchema $hook
     * @return array
     */
    protected function invokeHook($hook) {
        $hook->invokeSchema();
    }

    protected function getHookName() {
        return SDFHookConsts::HOOK_SCHEMA;
    }
}