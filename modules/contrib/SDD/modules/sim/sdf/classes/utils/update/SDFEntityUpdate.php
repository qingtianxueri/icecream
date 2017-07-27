<?php

namespace sdf\utils\update;

use sdf\exceptions\SDFUpdateException;

class SDFEntityUpdate extends SDFBaseUpdate {

    public function validate() {
        if (!$this->requireModule('bundle_copy')) {
            $e = 'Entity update: the required module "bundle_copy" is not found.';
            throw new SDFUpdateException($e);
        }

        if (!$this->requireFolder('entity')) {
            $e = 'Entity update: the required folder "entity" is not found.';
            throw new SDFUpdateException($e);
        }

        return TRUE;
    }

    public function update() {
        $dir = $this->scanDir('entity');
        if (empty($dir)) {
            return;
        }
        $path = $this->getUpdatePath('entity');
        foreach ($dir as $file) {
            $filepath = $path . $file;
            $content = file_get_contents($filepath);
            if (empty($content)) {
                continue;
            }
            $id = 'bundle_copy_import';
            $state = array();
            $state['values']['macro'] = $content;
            drupal_form_submit($id, $state);
        }
    }

}
