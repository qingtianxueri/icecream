<?php


namespace sdf\hooks\interfaces;


interface SDFHookMenuAlter extends SDFHook {

    public function invokeMenuAlter(&$items);
}