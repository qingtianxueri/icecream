<?php


namespace sdf_example\hookimpls\tasks;


use sdf\hooks\interfaces\tasks\SDFHookBlockInfoTask;
use sdf\hooks\interfaces\tasks\SDFHookBlockViewTask;

class SDFExampleBlockDelta1Impl
    implements SDFHookBlockInfoTask, SDFHookBlockViewTask {

    public function info() {
        return array('sdf_example_delta1' =>
            array(
                'info' => t('SDFExample Block Delta 1'),
                'cache' => DRUPAL_NO_CACHE
            )
        );
    }

    public function viewBlock() {
        // Implements hook block view for delta 1
        return array(
            'subject' => 'SDFExample BLock Delta 1',
            'content' => 'SDFExample BLock Delta 1 content.'
        );
    }

}