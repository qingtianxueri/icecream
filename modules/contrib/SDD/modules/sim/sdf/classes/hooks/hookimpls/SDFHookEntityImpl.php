<?php
/**
 * Creator: taoyuanjian
 * Date: 11/02/14
 * Time: 14:40
 */

namespace sdf\hooks\hookimpls;


use sdf\entities\SDFEntity;

abstract class SDFHookEntityImpl extends SDFHookOpImpl {

    const OP_VIEW = 'view';
    const OP_INSERT = 'insert';
    const OP_UPDATE = 'update';
    const OP_DELETE = 'delete';
    const OP_PRESAVE = 'presave';
    const OP_LOAD = 'load';

    /**
     * The entity being processed.
     * @var SDFEntity
     */
    protected $entity;
    /**
     * For hook entity view
     * @var string
     */
    protected $viewMode;

    /**
     * For hook entity view.
     * @var string
     */
    protected $langCode;

    protected function invokeEntityTasks(SDFEntity $entity, $op) {
        $this->op = $op;
        $this->entity = $entity;
        $this->invokeTasksNoReturn($entity->getBundle());
    }

    public function invokeEntityViewTasks(SDFEntity $entity, $viewMode, $langCode) {
        $this->viewMode = $viewMode;
        $this->langCode = $langCode;
        $this->invokeEntityTasks($entity, self::OP_VIEW);
    }

}