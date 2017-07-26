<?php


namespace sdf_example\hookimpls\tasks;


use sdf\hooks\interfaces\tasks\SDFHookBlockInfoTask;
use sdf\hooks\interfaces\tasks\SDFHookBlockViewTask;

class SDFExampleBlockDelta2Impl
    implements SDFHookBlockInfoTask, SDFHookBlockViewTask {

    public function info() {
        return array('sdf_example_delta2' =>
            array(
                'info' => t('SDFExample Block Delta 2'),
                'cache' => DRUPAL_NO_CACHE
            )
        );
    }

    public function viewBlock() {
        // Implements hook block view for delta 2
        return array(
            'subject' => 'SDFExample BLock Delta 2',
            'content' => 'SDFExample BLock Delta 2 content.'
        );
    }

}