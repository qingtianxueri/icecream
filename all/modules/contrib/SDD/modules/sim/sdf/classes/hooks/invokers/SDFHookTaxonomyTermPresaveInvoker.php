<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookTaxonomyTermPresave;
use sdf\hooks\invokers\base\SDFHookTaxonomyTermInvoker;

class SDFHookTaxonomyTermPresaveInvoker extends SDFHookTaxonomyTermInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_TAXONOMY_TERM_PRESAVE;
    }

    /**
     * @param SDFHookTaxonomyTermPresave $hook
     * @return void
     */
    protected function invokeHook($hook) {
        $hook->invokeTaxonomyTermPresave($this->entity);
    }
}