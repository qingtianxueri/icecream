<?php

namespace sdf\utils\update;

use sdf\exceptions\SDFUpdateException;
use sdf\utils\SDFStr;

class SDFPHPUpdate extends SDFBaseUpdate {

    public function validate() {
        if (!$this->requireFolder('php')) {
            $e = SDFStr::get('EXCEPTION_UPDATE_FOLDER_NOT_FOUND', array(
                '!name' => 'PHP', '!folder' => 'php'
            ));
            throw new SDFUpdateException($e);
        }

        return TRUE;
    }

    public function update() {
        $dir = $this->scanDir('php');
        $path = $this->getUpdatePath('php');
        if (empty($dir)) {
            $e = SDFStr::get('EXCEPTION_UPDATE_FOLDER_NO_FILE', array(
                '!name' => 'PHP', '!folder' => 'php'
            ));
            throw new SDFUpdateException($e);
        }
        foreach ($dir as $file) {
            $source = $path . $file;
            if (!$this->validContent($source)) {
                $e = SDFStr::get('EXCEPTION_UPDATE_CONTENT_EMPTY', array(
                    '!name' => 'PHP', '!file' => $file
                ));
                throw new SDFUpdateException($e);
            }
            require_once $source;
        }
    }
}
