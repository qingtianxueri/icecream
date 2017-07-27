<?php


namespace sdf\hooks\interfaces;


interface SDFHookBlockView extends SDFHookOp {

    public function invokeBlockView($delta);
}