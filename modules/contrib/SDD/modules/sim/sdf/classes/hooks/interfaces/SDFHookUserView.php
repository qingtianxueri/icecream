<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFUser;

interface SDFHookUserView extends SDFHook {

    public function invokeUserView(SDFUser $user, $viewMode, $langCode);
}