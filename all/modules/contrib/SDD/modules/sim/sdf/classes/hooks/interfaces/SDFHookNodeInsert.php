<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFNode;

interface SDFHookNodeInsert extends SDFHookOp {

    public function invokeNodeInsert(SDFNode $node);
}