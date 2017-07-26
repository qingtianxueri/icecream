<?php


namespace sdf\hooks\invokers;


use sdf\consts\SDFHookConsts;
use sdf\entities\SDFEntity;
use sdf\entities\SDFTerm;
use sdf\hooks\interfaces\SDFHookTaxonomyTermView;
use sdf\hooks\invokers\base\SDFHookEntityViewInvoker;

class SDFHookTaxonomyTermViewInvoker extends SDFHookEntityViewInvoker {

    /**
     * @var SDFTerm
     */
    protected $entity;

    /**
     * Returns a newly instantiated SDFEntity
     * @return SDFEntity
     */
    protected function newEntity() {
        return new SDFTerm();
    }

    protected function getHookName() {
        return SDFHookConsts::HOOK_TAXONOMY_TERM_VIEW;
    }

    /**
     * @param SDFHookTaxonomyTermView $hook
     * @return void
     */
    protected function invokeHook($hook) {
        $hook->invokeTaxonomyTermView($this->entity, $this->viewMode, $this->langCode);
    }
}