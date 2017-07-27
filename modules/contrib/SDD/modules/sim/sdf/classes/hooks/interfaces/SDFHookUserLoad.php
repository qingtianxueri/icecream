<?php


namespace sdf\hooks\interfaces;


interface SDFHookUserLoad extends SDFHook {

    /**
     * @param array $users An array of user objects, indexed by uid.
     * @return void
     */
    public function invokeUserLoad($users);
}