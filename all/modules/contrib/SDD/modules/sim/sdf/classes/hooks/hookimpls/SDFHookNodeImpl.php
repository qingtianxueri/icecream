<?php


namespace sdf\hooks\hookimpls;


use sdf\entities\SDFNode;
use sdf\hooks\interfaces\SDFHookNodeDelete;
use sdf\hooks\interfaces\SDFHookNodeInsert;
use sdf\hooks\interfaces\SDFHookNodePresave;
use sdf\hooks\interfaces\SDFHookNodeUpdate;
use sdf\hooks\interfaces\SDFHookOp;
use sdf\hooks\interfaces\tasks\SDFHookNodeDeleteTask;
use sdf\hooks\interfaces\tasks\SDFHookNodeInsertTask;
use sdf\hooks\interfaces\tasks\SDFHookNodePresaveTask;
use sdf\hooks\interfaces\tasks\SDFHookNodeUpdateTask;

abstract class SDFHookNodeImpl extends SDFHookEntityImpl
    implements SDFHookNodePresave, SDFHookNodeInsert, SDFHookNodeUpdate, SDFHookNodeDelete {

    /**
     * @var SDFNode
     */
    protected $entity;

    public function invokeNodePresave(SDFNode $node) {
        $this->invokeEntityTasks($node, self::OP_PRESAVE);
    }

    public function invokeNodeInsert(SDFNode $node) {
        $this->invokeEntityTasks($node, self::OP_INSERT);
    }

    public function invokeNodeUpdate(SDFNode $node) {
        $this->invokeEntityTasks($node, self::OP_UPDATE);
    }

    public function invokeNodeDelete(SDFNode $node) {
        $this->invokeEntityTasks($node, self::OP_DELETE);
    }

    /**
     * @param SDFHookOp $task
     * @return mixed
     */
    protected function invokeTask($task) {
        switch ($this->op) {
            case self::OP_PRESAVE:
                /** @var $task SDFHookNodePresaveTask */
                $task->presaveNode($this->entity);
                break;
            case self::OP_INSERT:
                /** @var $task SDFHookNodeInsertTask */
                $task->insertNode($this->entity);
                break;
            case self::OP_UPDATE:
                /** @var $task SDFHookNodeUpdateTask */
                $task->updateNode($this->entity);
                break;
            case self::OP_DELETE:
                /** @var $task SDFHookNodeDeleteTask */
                $task->deleteNode($this->entity);
                break;

        }
    }

}