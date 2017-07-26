<?php


namespace sdf\hooks\hookimpls;


use sdf\hooks\interfaces\SDFHookBlockInfo;
use sdf\hooks\interfaces\SDFHookBlockView;
use sdf\hooks\interfaces\SDFHookOp;
use sdf\hooks\interfaces\tasks\SDFHookBlockInfoTask;
use sdf\hooks\interfaces\tasks\SDFHookBlockViewTask;

abstract class SDFHookBlockImpl extends SDFHookOpImpl
    implements SDFHookBlockInfo, SDFHookBlockView {

    const OP_INFO = 'info';
    const OP_VIEW = 'view';
    const OP_CONFIGURE = 'configure';
    const OP_SAVE = 'save';

    public function invokeBlockInfo() {
        $this->op = self::OP_INFO;
        return $this->invokeTasksForResults('');
    }

    public function invokeBlockView($delta) {
        $this->op = self::OP_VIEW;
        return $this->invokeTasksForOneResult($delta);
    }

    /**
     * @param SDFHookOp $task
     * @return mixed
     */
    protected function invokeTask($task) {
        switch ($this->op) {
            case self::OP_INFO:
                /** @var $task SDFHookBlockInfoTask */
                return $task->info();
            case self::OP_VIEW:
                /** @var $task SDFHookBlockViewTask */
                return $task->viewBlock();
        }
        return NULL;
    }

}