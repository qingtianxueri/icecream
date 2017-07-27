<?php


namespace sdf\hooks\interfaces\tasks;


use sdf\entities\SDFNode;

interface SDFHookNodeDeleteTask extends SDFHookTask {

    public function deleteNode(SDFNode $node);
}