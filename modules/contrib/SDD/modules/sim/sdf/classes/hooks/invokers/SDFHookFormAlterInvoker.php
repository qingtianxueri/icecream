<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\invokers\base\SDFHookInvoker;
use sdf\hooks\interfaces\SDFHookFormAlter;

class SDFHookFormAlterInvoker extends SDFHookInvoker{

    private $form;
    private $formState;
    private $formId;

    public function __construct(&$form, $formState, $formId) {
        parent::__construct();
        $this->form = &$form;
        $this->formState = $formState;
        $this->formId = $formId;
    }

    protected function getHookName() {
        return SDFHookConsts::HOOK_FORM_ALTER;
    }

    /**
     * @param SDFHookFormAlter $hook
     * @return void
     */
    protected function invokeHook($hook) {
        $hook->invokeFormAlter($this->form, $this->formState, $this->formId);
    }
}