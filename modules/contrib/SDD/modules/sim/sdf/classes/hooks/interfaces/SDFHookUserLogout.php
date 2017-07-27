<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFUser;

interface SDFHookUserLogout extends SDFHook {

    /**
     * @param SDFUser $account The user object on which the operation was just performed.
     * @return void
     */
    public function invokeUserLogout(SDFUser $account);
}