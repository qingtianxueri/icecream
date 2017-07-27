<?php


namespace sdf\hooks\interfaces\tasks;


use sdf\entities\SDFNode;

interface SDFHookNodeInsertTask extends SDFHookTask {

    public function insertNode(SDFNode $node);
}