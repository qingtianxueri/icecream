<?php


namespace sdf\hooks\interfaces\tasks;


use sdf\entities\SDFNode;

interface SDFHookNodePresaveTask extends SDFHookTask {

    public function presaveNode(SDFNode $node);
}