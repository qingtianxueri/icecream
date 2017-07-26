<?php


namespace sdf\hooks\interfaces;


interface SDFHookExit extends SDFHook {

    public function invokeExit();
}