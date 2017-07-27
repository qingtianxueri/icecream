<?php

namespace sdf\hooks\invokers\base;

use sdf\exceptions\SDFHookException;
use sdf\hooks\interfaces\SDFHook;
use sdf\system\SDFModule;
use sdf\system\SDFSystem;


/**
 * The standard hook, no return.
 * @package sdf\hooks\invokers\base
 */
abstract class SDFHookInvoker {

    function __construct() {

    }

    public final function invoke() {
        $modules = $this->getRegisteredModules();
        foreach ($modules as $module) {
            try {
                /** @var SDFModule $module */
                $hook = $module->getHook($this->getHookName());
                if (!empty($hook)) {
                    $this->onInvoke($hook, $module);
                }
            } catch (SDFHookException $e) {
                // Make the exception more detail.
                $vars = array(
                    '@module' => get_class($module),
                    '@hook' => empty($hook) ? 'NULL' : get_class($hook),
                    '@message' => $e->getMessage()
                );
                throw new SDFHookException(t('Module: @module; Hook: @hook; Message: @message', $vars));
            }

        }
        // Return this to chain the method for convenience
        return $this;
    }

    /**
     * Some hooks have something return, some don't have.
     * This function is to let sub class of Hook Invoker to deal with the result.
     *
     * @param SDFHook $hook
     * @param SDFModule $module The current module being invoked
     * @return mixed
     */
    protected function onInvoke($hook, SDFModule $module) {
        return $this->invokeHook($hook);
    }

    private function getRegisteredModules() {
        return SDFSystem::instance()->getRegisteredModules();
    }

    /**
     * This function is to let sub class of Hook Invoker to invoke the right hook interface,
     * because hook interfaces have different parameters.
     *
     * @param SDFHook $hook Hook impl instance.
     *      Cannot declare the type (the interface SDFHook) of the hook here,
     *      because PHP has no class/interface cast feature.
     *      Use the parameter comment to specify the type (interface) of the hook
     * @return mixed
     */
    abstract protected function invokeHook($hook);

    /**
     * @return String return a hook name in HookNameConsts
     */
    abstract protected function getHookName();
}