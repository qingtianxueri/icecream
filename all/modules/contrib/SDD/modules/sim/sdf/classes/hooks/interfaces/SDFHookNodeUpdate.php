<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFNode;

interface SDFHookNodeUpdate extends SDFHookOp {

    public function invokeNodeUpdate(SDFNode $node);
}