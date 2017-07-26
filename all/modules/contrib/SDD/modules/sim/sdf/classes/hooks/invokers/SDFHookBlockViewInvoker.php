<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookBlockView;
use sdf\hooks\invokers\base\SDFHookResultInvoker;

class SDFHookBlockViewInvoker extends SDFHookResultInvoker {
    private $delta;

    public function __construct($delta) {
        parent::__construct();
        $this->delta = $delta;
    }

    protected function getHookName() {
        return SDFHookConsts::HOOK_BLOCK_VIEW;
    }

    /**
     * @param SDFHookBlockView $hook
     * @return mixed
     */
    protected function invokeHook($hook) {
        return $hook->invokeBlockView($this->delta);
    }
}