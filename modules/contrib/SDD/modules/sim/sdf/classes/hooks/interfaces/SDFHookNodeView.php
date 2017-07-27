<?php


namespace sdf\hooks\interfaces;


use sdf\entities\SDFNode;

interface SDFHookNodeView extends SDFHookOp {

    public function invokeNodeView(SDFNode $node, $viewMode, $langCode);
}