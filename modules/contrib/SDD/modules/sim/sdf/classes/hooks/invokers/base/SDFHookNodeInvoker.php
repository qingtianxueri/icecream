<?php


namespace sdf\hooks\invokers\base;


use sdf\entities\SDFEntity;
use sdf\entities\SDFNode;

abstract class SDFHookNodeInvoker extends SDFHookEntityInvoker {

    /**
     * @var SDFNode
     */
    protected $entity;

    /**
     * Returns a newly instantiated SDFEntity
     * @return SDFEntity
     */
    protected function newEntity() {
        return new SDFNode();
    }
}