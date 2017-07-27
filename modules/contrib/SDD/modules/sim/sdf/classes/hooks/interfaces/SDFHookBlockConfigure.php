<?php


namespace sdf\hooks\interfaces;


interface SDFHookBlockConfigure extends SDFHookOp {

    public function invokeBlockConfigure($delta);
}