<?php

namespace sdf_example\hookimpls;


use sdf\hooks\interfaces\SDFHookInit;

class SDFExampleHookInitImpl implements SDFHookInit {

    public function invokeInit() {
        //drupal_set_message('SDF Example hook init');
    }

}