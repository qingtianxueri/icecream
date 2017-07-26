<?php

namespace sdf\structs;

use sdf\exceptions\SDFStructException;

abstract class SDFClassStruct extends SDFStruct {

    /**
     * Class prefix
     *
     * @var string
     */
    protected $classPrefix;

    public function setClassPrefix($prefix) {
        $this->classPrefix = $prefix;
    }

    protected function requirement() {
        if (empty($this->module)) {
            $error = 'Project module is not set.';
            throw new SDFStructException($error);
        }

        if (empty($this->classPrefix)) {
            $error = 'Project class prefix is not set';
            throw new SDFStructException($error);
        }
    }
}