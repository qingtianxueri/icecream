<?php


namespace sdf\hooks\hookimpls;

use sdf\hooks\interfaces\SDFHookOp;

abstract class SDFHookOpImpl implements SDFHookOp {

    /**
     * Indicates the current operation of the hook.
     * @var string
     */
    protected $op;

    /**
     * Invoke tasks for actions(operations), no result returned.
     *
     * @param mixed $type Type such as node type, block delta, form id, etc...
     */
    protected function invokeTasksNoReturn($type) {
        $tasks = $this->retrieveTasks($type);
        foreach ($tasks as $task) {
            $this->invokeTask($task);
        }
    }

    /**
     * Invoke tasks for results (array merged)
     *
     * @param $type
     * @return array
     */
    protected function invokeTasksForResults($type) {
        $tasks = $this->retrieveTasks($type);
        $results = array();
        foreach ($tasks as $task) {
            $results = array_merge($results, $this->invokeTask($task));
        }
        return $results;
    }

    /**
     * Invoke tasks for one result only, this only takes the result from the first task.
     *
     * @param $type
     * @return mixed
     */
    protected function invokeTasksForOneResult($type) {
        $tasks = $this->retrieveTasks($type);
        foreach ($tasks as $task) {
            return $this->invokeTask($task);
        }
        return NULL;
    }

    /**
     * @param SDFHookOp $task
     * @return mixed
     */
    abstract protected function invokeTask($task);

    /**
     * Get and validate tasks.
     *
     * @param $type
     * @return array
     * @throws \sdf\exceptions\SDFHookException
     */
    protected function retrieveTasks($type) {
        $tasks = $this->getTasks($type, $this->op);
        if (empty($tasks)) {
            $tasks = array();
        }
        if (!is_array($tasks)) {
            $tasks = array($tasks);
        }
        $this->validateTasks($tasks);
        return $tasks;
    }

    /**
     * Validates the tasks, mainly to throw the exceptions.
     * Default doing nothing.
     * @param $tasks
     */
    protected function validateTasks($tasks) {

    }

}