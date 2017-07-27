<?php


namespace sdf\hooks\interfaces\tasks;


use sdf\entities\SDFNode;

interface SDFHookNodeViewTask extends SDFHookTask {

    public function viewNode(SDFNode $node, $viewMode, $langCode);
}