<?php
/**
 * Creator: taoyuanjian
 * Date: 11/02/14
 * Time: 15:11
 */

namespace sdf\hooks\hookimpls;


use sdf\hooks\interfaces\SDFHookFormAlter;
use sdf\hooks\interfaces\tasks\SDFHookFormAlterTask;

abstract class SDFHookFormAlterImpl extends SDFHookOpImpl implements SDFHookFormAlter {

    private $form;
    private $formState;

    final public function invokeFormAlter(&$form, $formState, $formId) {
        $this->form = &$form;
        $this->formState = $formState;
        $this->invokeTasksNoReturn($formId);
    }

    /**
     * @param SDFHookFormAlterTask $task
     * @return mixed
     */
    protected function invokeTask($task) {
        $task->alterForm($this->form, $this->formState);
    }

}