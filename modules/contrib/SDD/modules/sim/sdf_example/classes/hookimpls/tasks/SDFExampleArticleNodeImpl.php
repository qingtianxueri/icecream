<?php


namespace sdf_example\hookimpls\tasks;


use sdf\entities\SDFNode;
use sdf\hooks\interfaces\tasks\SDFHookNodeDeleteTask;
use sdf\hooks\interfaces\tasks\SDFHookNodeInsertTask;
use sdf\hooks\interfaces\tasks\SDFHookNodePresaveTask;
use sdf\hooks\interfaces\tasks\SDFHookNodeUpdateTask;
use sdf\utils\SDFLog;

class SDFExampleArticleNodeImpl
    implements SDFHookNodePresaveTask, SDFHookNodeInsertTask, SDFHookNodeUpdateTask, SDFHookNodeDeleteTask {

    public function deleteNode(SDFNode $node) {
        SDFLog::setStatusMessage('Hook node delete invoked for ' . $node->getBundle());
    }

    public function insertNode(SDFNode $node) {
        SDFLog::setStatusMessage('Hook node insert invoked for ' . $node->getBundle());
    }

    public function updateNode(SDFNode $node) {
        SDFLog::setStatusMessage('Hook node update invoked for ' . $node->getBundle());
    }

    public function presaveNode(SDFNode $node) {
        SDFLog::setStatusMessage('Hook node presave invoked for ' . $node->getBundle());
    }
}