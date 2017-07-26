<?php


namespace sdf\hooks\interfaces;


interface SDFHookInstall extends SDFHook {

    public function invokeInstall();
}