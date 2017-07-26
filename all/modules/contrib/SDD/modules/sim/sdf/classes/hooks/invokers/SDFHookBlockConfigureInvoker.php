<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookBlockConfigure;
use sdf\hooks\invokers\base\SDFHookResultInvoker;

class SDFHookBlockConfigureInvoker extends SDFHookResultInvoker{
    private $delta;

    public function __construct($delta) {
        parent::__construct();
        $this->delta = $delta;
    }

    protected function getHookName() {
        return SDFHookConsts::HOOK_BLOCK_CONFIGURE;
    }

    /**
     * @param SDFHookBlockConfigure $hook
     * @return mixed
     */
    protected function invokeHook($hook) {
        return $hook->invokeBlockConfigure($this->delta);
    }
}