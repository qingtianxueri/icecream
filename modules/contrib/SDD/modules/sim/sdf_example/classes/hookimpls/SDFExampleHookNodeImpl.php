<?php


namespace sdf_example\hookimpls;


use sdf\hooks\hookimpls\SDFHookNodeImpl;
use sdf_example\hookimpls\tasks\SDFExampleArticleNodeImpl;

class SDFExampleHookNodeImpl extends SDFHookNodeImpl {

    /**
     * @param string $type Could be node type, form id, block delta, etc... depending on the hook.
     * @param string $op Op of node: presave, insert, update, delete, view, etc...
     * @return array of SDFHookOp
     */
    public function getTasks($type, $op) {
        if ($type == 'article') {
            switch ($op) {
                case self::OP_PRESAVE:
                case self::OP_INSERT:
                case self::OP_UPDATE:
                case self::OP_DELETE:
                return array(
                    new SDFExampleArticleNodeImpl()
                );
            }

        }
        return NULL;
    }
}