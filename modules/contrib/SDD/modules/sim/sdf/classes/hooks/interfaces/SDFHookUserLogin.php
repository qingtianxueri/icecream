<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFUser;

interface SDFHookUserLogin extends SDFHook {

    /**
     * @param array $edit The array of form values submitted by the user.
     * @param SDFUser $account The user object on which the operation was just performed.
     * @return void
     */
    public function invokeUserLogin(&$edit, SDFUser $account);
}