<?php


namespace sdf\hooks\invokers\base;


use sdf\entities\SDFEntity;
use sdf\entities\SDFTerm;

abstract class SDFHookTaxonomyTermInvoker extends SDFHookEntityInvoker {

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


}