<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookTaxonomyTermUpdate;
use sdf\hooks\invokers\base\SDFHookTaxonomyTermInvoker;

class SDFHookTaxonomyTermUpdateInvoker extends SDFHookTaxonomyTermInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_TAXONOMY_TERM_UPDATE;
    }

    /**
     * @param SDFHookTaxonomyTermUpdate $hook
     * @return void
     */
    protected function invokeHook($hook) {
        $hook->invokeTaxonomyTermUpdate($this->entity);
    }
}