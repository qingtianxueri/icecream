<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFUser;

interface SDFHookUserUpdate extends SDFHook {

    public function invokeUserUpdate(SDFUser $user);
}