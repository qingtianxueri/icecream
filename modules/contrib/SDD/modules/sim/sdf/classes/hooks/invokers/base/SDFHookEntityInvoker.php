<?php

namespace sdf\hooks\invokers\base;

use sdf\entities\SDFEntity;

abstract class SDFHookEntityInvoker extends SDFHookInvoker {

    /**
     * @param SDFEntity
     */
    protected $entity;

    public function __construct($entity) {
        parent::__construct();
        $this->entity = $this->newEntity()->loadByDrupalEntity($entity);
    }

    /**
     * Returns a newly instantiated SDFEntity
     * @return SDFEntity
     */
    protected abstract function newEntity();

}