<?php


namespace sdf\hooks\invokers\base;


abstract class SDFHookEntityViewInvoker extends SDFHookEntityInvoker {

    protected $viewMode;
    protected $langCode;

    public function __construct($entity, $viewMode, $langCode) {
        parent::__construct($entity);
        $this->viewMode = $viewMode;
        $this->langCode = $langCode;
    }

}