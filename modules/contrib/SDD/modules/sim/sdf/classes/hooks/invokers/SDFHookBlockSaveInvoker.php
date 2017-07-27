<?php


namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookBlockSave;
use sdf\hooks\invokers\base\SDFHookInvoker;

class SDFHookBlockSaveInvoker extends SDFHookInvoker {
    private $delta;
    private $edit;

    public function __construct($delta, $edit) {
        parent::__construct();
        $this->delta = $delta;
        $this->edit = $edit;
    }

    protected function getHookName() {
        return SDFHookConsts::HOOK_BLOCK_SAVE;
    }

    /**
     * @param SDFHookBlockSave $hook
     * @return mixed
     */
    protected function invokeHook($hook) {
        $hook->invokeBlockSave($this->delta, $this->edit);
    }
}