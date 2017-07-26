<?php


namespace sdf\hooks\hookimpls;


use sdf\entities\SDFTerm;
use sdf\hooks\interfaces\SDFHookOp;
use sdf\hooks\interfaces\SDFHookTaxonomyTermDelete;
use sdf\hooks\interfaces\SDFHookTaxonomyTermInsert;
use sdf\hooks\interfaces\SDFHookTaxonomyTermPresave;
use sdf\hooks\interfaces\SDFHookTaxonomyTermUpdate;
use sdf\hooks\interfaces\tasks\SDFHookTaxonomyTermDeleteTask;
use sdf\hooks\interfaces\tasks\SDFHookTaxonomyTermInsertTask;
use sdf\hooks\interfaces\tasks\SDFHookTaxonomyTermPresaveTask;
use sdf\hooks\interfaces\tasks\SDFHookTaxonomyTermUpdateTask;

abstract class SDFHookTaxonomyImpl extends SDFHookEntityImpl
    implements SDFHookTaxonomyTermPresave, SDFHookTaxonomyTermInsert,
    SDFHookTaxonomyTermUpdate, SDFHookTaxonomyTermDelete {

    /**
     * @var SDFTerm
     */
    protected $entity;

    public function invokeTaxonomyTermPresave(SDFTerm $term) {
        $this->invokeEntityTasks($term, self::OP_PRESAVE);
    }

    public function invokeTaxonomyTermInsert(SDFTerm $term) {
        $this->invokeEntityTasks($term, self::OP_INSERT);
    }

    public function invokeTaxonomyTermUpdate(SDFTerm $term) {
        $this->invokeEntityTasks($term, self::OP_UPDATE);
    }

    public function invokeNodeDelete(SDFTerm $term) {
        $this->invokeEntityTasks($term, self::OP_DELETE);
    }

    /**
     * @param SDFHookOp $task
     * @return mixed
     */
    protected function invokeTask($task) {
        switch ($this->op) {
            case self::OP_PRESAVE:
                /** @var $task SDFHookTaxonomyTermPresaveTask */
                $task->presaveTerm($this->entity);
                break;
            case self::OP_INSERT:
                /** @var $task SDFHookTaxonomyTermInsertTask */
                $task->insertTerm($this->entity);
                break;
            case self::OP_UPDATE:
                /** @var $task SDFHookTaxonomyTermUpdateTask */
                $task->updateTerm($this->entity);
                break;
            case self::OP_DELETE:
                /** @var $task SDFHookTaxonomyTermDeleteTask */
                $task->deleteTerm($this->entity);
                break;

        }
    }

}