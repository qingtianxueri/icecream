<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFUser;

interface SDFHookUserInsert extends SDFHook {

    public function invokeUserInsert(SDFUser $user);
}