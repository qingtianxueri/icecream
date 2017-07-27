<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFNode;

interface SDFHookNodeDelete extends SDFHookOp {

    public function invokeNodeDelete(SDFNode $node);
}