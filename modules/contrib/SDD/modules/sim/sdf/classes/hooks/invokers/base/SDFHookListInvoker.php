<?php

namespace sdf\hooks\invokers\base;

use sdf\exceptions\SDFHookException;
use sdf\system\SDFModule;

/**
 * Invokes the hooks that collect data in array, such as hook_menu.
 * @package sdf\hooks\invokers\base
 */
abstract class SDFHookListInvoker extends SDFHookInvoker {

    /**
     * Any array result from the hook.
     * @var array
     */
    protected $results = array();

    protected function onInvoke($hook, SDFModule $module) {
        $results = $this->invokeHook($hook);
        if (!is_array($results)) {
            throw new SDFHookException('This hook does not return an array as it should.');
        }
        $this->onInvokeResults($results, $module);
        $this->results = array_merge($this->results, $results);
    }

    /**
     * Let the sub invoker override the results.
     *
     * @param $results
     * @param SDFModule $module
     */
    protected function onInvokeResults(&$results, SDFModule $module) {

    }

    public function getList() {
        return $this->results;
    }

}