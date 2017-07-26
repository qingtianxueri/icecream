<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFUser;

interface SDFHookUserDelete extends SDFHook {

    public function invokeUserDelete(SDFUser $user);
}