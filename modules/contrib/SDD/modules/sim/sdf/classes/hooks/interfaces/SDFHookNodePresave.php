<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFNode;

interface SDFHookNodePresave extends SDFHookOp {

    public function invokeNodePresave(SDFNode $node);
}