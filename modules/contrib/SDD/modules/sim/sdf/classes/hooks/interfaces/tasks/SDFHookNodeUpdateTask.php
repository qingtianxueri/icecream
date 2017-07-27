<?php


namespace sdf\hooks\interfaces\tasks;


use sdf\entities\SDFNode;

interface SDFHookNodeUpdateTask extends SDFHookTask {

    public function updateNode(SDFNode $node);
}