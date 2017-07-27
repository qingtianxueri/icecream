<?php


namespace sdf\hooks\invokers;


use sdf\consts\SDFHookConsts;
use sdf\entities\SDFEntity;
use sdf\entities\SDFUser;
use sdf\hooks\interfaces\SDFHookUserView;
use sdf\hooks\invokers\base\SDFHookEntityViewInvoker;

class SDFHookUserViewInvoker extends SDFHookEntityViewInvoker {

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


    /**
     * @return String return a hook name in HookNameConsts
     */
    protected function getHookName() {
        return SDFHookConsts::HOOK_USER_VIEW;
    }

    /**
     * @param SDFHookUserView $hook
     * @return mixed|void
     */
    protected function invokeHook($hook) {
        $hook->invokeUserView($this->entity, $this->viewMode, $this->langCode);
    }
}