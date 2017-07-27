<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFUser;

interface SDFHookUserPresave extends SDFHook {

    public function invokeUserPresave(SDFUser $user);
}