<?php


namespace sdf\hooks\interfaces;


interface SDFHookCron extends SDFHook {

    public function invokeCron();
}