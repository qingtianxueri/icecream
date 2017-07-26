<?php

namespace sdf\hooks\invokers;

use sdf\consts\SDFHookConsts;
use sdf\entities\SDFTerm;
use sdf\hooks\interfaces\SDFHookTaxonomyTermDelete;
use sdf\hooks\invokers\base\SDFHookTaxonomyTermInvoker;

class SDFHookTaxonomyTermDeleteInvoker extends SDFHookTaxonomyTermInvoker {

    /**
     * @var SDFTerm
     */
    protected $entity;

    protected function getHookName() {
        return SDFHookConsts::HOOK_TAXONOMY_TERM_DELETE;
    }

    /**
     * @param SDFHookTaxonomyTermDelete $hook
     * @return void
     */
    protected function invokeHook($hook) {
        $hook->invokeTaxonomyTermDelete($this->entity);
    }
}