<?php


namespace sdf\hooks\invokers;


use sdf\consts\SDFHookConsts;
use sdf\entities\SDFEntity;
use sdf\entities\SDFNode;
use sdf\hooks\interfaces\SDFHookNodeView;
use sdf\hooks\invokers\base\SDFHookEntityViewInvoker;

class SDFHookNodeViewInvoker extends SDFHookEntityViewInvoker {

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


    /**
     * @return String return a hook name in HookNameConsts
     */
    protected function getHookName() {
        return SDFHookConsts::HOOK_NODE_VIEW;
    }

    /**
     * @param SDFHookNodeView $hook
     * @return mixed|void
     */
    protected function invokeHook($hook) {
        $hook->invokeNodeView($this->entity, $this->viewMode, $this->langCode);
    }
}