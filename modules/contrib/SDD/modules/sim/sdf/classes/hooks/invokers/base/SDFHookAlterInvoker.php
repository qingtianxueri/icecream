<?php


namespace sdf\hooks\invokers\base;

/**
 * Invokes the hooks that alter data, such as hook_form_alter.
 * @package sdf\hooks\invokers\base
 */
abstract class SDFHookAlterInvoker extends SDFHookInvoker {

    /**
     * Data to be altered.
     * @var array
     */
    protected $data;

    function __construct(&$data) {
        parent::__construct();
        $this->data = &$data;
    }

}