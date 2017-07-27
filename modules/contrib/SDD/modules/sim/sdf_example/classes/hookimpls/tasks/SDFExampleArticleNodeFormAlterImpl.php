<?php


namespace sdf_example\hookimpls\tasks;


use sdf\hooks\interfaces\tasks\SDFHookFormAlterTask;

class SDFExampleArticleNodeFormAlterImpl implements SDFHookFormAlterTask {

    public function alterForm(&$form, $formState) {
        $form['sdf_example_text'] = array(
            '#type' => 'textfield',
            '#title' => 'SDF Example Text',
        );
    }
}