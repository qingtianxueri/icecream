<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\hooks\interfaces\SDFHookTaxonomyTermInsert;
use sdf\hooks\invokers\base\SDFHookTaxonomyTermInvoker;

class SDFHookTaxonomyTermInsertInvoker extends SDFHookTaxonomyTermInvoker {

    protected function getHookName() {
        return SDFHookConsts::HOOK_TAXONOMY_TERM_INSERT;
    }

    /**
     * @param SDFHookTaxonomyTermInsert $hook
     * @return void
     */
    protected function invokeHook($hook) {
        $hook->invokeTaxonomyTermInsert($this->entity);
    }
}