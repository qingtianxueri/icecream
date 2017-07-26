<?php


namespace sdf\hooks\interfaces;


interface SDFHookUninstall extends SDFHook {

    public function invokeUninstall();
}