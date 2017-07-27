<?php


namespace sdf\hooks\invokers\base;


use sdf\entities\SDFEntity;
use sdf\entities\SDFUser;

abstract class SDFHookUserInvoker extends SDFHookEntityInvoker {

    /**
     * @var SDFUser
     */
    protected $entity;

    /**
     * Returns a newly instantiated SDFEntity
     * @return SDFEntity
     */
    protected function newEntity() {
        return new SDFUser();
    }


}