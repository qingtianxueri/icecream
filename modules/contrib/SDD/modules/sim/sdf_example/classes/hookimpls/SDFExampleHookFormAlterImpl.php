<?php

namespace sdf_example\hookimpls;

use sdf\hooks\hookimpls\SDFHookFormAlterImpl;
use sdf_example\hookimpls\tasks\SDFExampleArticleNodeFormAlterImpl;

class SDFExampleHookFormAlterImpl extends SDFHookFormAlterImpl {

    /**
     * @param string $type Could be node type, form id, block delta, etc... depending on the hook.
     * @param string $op This op is useless to form alter
     * @return array of SDFHookOp
     */
    public function getTasks($type, $op) {
        if ($type == 'article_node_form') {
            return array(
                new SDFExampleArticleNodeFormAlterImpl()
            );
        }
        return NULL;
    }

}