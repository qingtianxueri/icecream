<?php

namespace sdf\hooks\invokers\base;

use sdf\exceptions\SDFHookException;
use sdf\system\SDFModule;

/**
 * Invokes the hooks that have result to return, such as hook_block_view.
 * This invoker only keeps the result from the last module invoked.
 */
abstract class SDFHookResultInvoker extends SDFHookInvoker {

    /**
     * Any result returned from the hook.
     * @var mixed
     */
    protected $result;

    protected function onInvoke($hook, SDFModule $module) {
        $result = $this->invokeHook($hook);
        if (empty($result)) {
            throw new SDFHookException('This hook does not return any result as it should.');
        }
        $this->result = $result;
    }

    public function getResult() {
        return $this->result;
    }

}