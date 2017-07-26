<?php


namespace sdf\hooks\interfaces;


interface SDFHookPermission extends SDFHook {

    public function invokePermission();
}