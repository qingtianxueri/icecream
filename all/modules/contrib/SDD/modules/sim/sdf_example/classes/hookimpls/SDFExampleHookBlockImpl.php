<?php


namespace sdf_example\hookimpls;


use sdf\hooks\hookimpls\SDFHookBlockImpl;
use sdf_example\hookimpls\tasks\SDFExampleBlockDelta1Impl;
use sdf_example\hookimpls\tasks\SDFExampleBlockDelta2Impl;

class SDFExampleHookBlockImpl extends SDFHookBlockImpl {

    /**
     * @param mixed $type Could be node type, form id, block delta, etc... depending on the hook.
     * @param string $op Op of block: info, view, configure, save
     * @return array of SDFHookOp
     */
    public function getTasks($type, $op) {
        // Empty delta meaning hook block info.
        if ($type == '') {
            return array(
                new SDFExampleBlockDelta1Impl(),
                new SDFExampleBlockDelta2Impl()
            );
        }

        if ($type == 'sdf_example_delta1') {
            return array(
                new SDFExampleBlockDelta1Impl(),
            );
        }

        if ($type == 'sdf_example_delta2') {
            return array(
                new SDFExampleBlockDelta2Impl()
            );
        }

        return NULL;
    }
}