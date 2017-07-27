<?php


namespace sdf\hooks\interfaces;


interface SDFHookAdminPathsAlter extends SDFHook {

    public function invokeAdminPathsAlter(&$paths);
}