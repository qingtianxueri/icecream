<?php


namespace sdf\hooks\interfaces;


/**
 * Interface SDFHookOp
 * For task-able hooks, such as hook node (view/insert/update/...) by node type, hook form alter by form id,
 * block by delta
 *
 * @package sdf\hooks\interfaces
 */
interface SDFHookOp extends SDFHook {

    /**
     * @param string $type Could be node type, form id, block delta, etc... depending on the hook.
     * @param string $op Op of the hook, such as view, presave, insert, update, delete, will be different depending on
     *      the hook invoked (hook block and hook node have different op, hook form alter does not have op so its op='')
     * @return array of SDFHookTask
     */
    public function getTasks($type, $op);
}