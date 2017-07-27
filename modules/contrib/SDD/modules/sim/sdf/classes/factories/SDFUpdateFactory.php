<?php

namespace sdf\factories;

use sdf\consts\SDFConst;
use sdf\exceptions\SDFUpdateException;
use sdf\utils\update\SDFBaseUpdate;
use sdf\utils\update\SDFDBUpdate;
use sdf\utils\update\SDFEntityUpdate;
use sdf\utils\update\SDFPHPUpdate;
use sdf\utils\update\SDFViewsUpdate;

class SDFUpdateFactory extends SDFFactory {

    protected $module;

    protected $version;

    /**
     * Create an Update instance.
     *
     * @param string $name
     * @throws SDFUpdateException
     *
     * @return SDFBaseUpdate
     */
    public function createUpdate($name) {
        switch ($name) {
            case SDFConst::UPDATE_ENTITY:
                return new SDFEntityUpdate($this->module, $this->version);
                break;
            case SDFConst::UPDATE_VIEWS:
                return new SDFViewsUpdate($this->module, $this->version);
                break;
            case SDFConst::UPDATE_DB:
                return new SDFDBUpdate($this->module, $this->version);
                break;
            case SDFConst::UPDATE_PHP:
                return new SDFPHPUpdate($this->module, $this->version);
                break;
            default:
                throw new SDFUpdateException('Update instance ' . $name . ' is not found.');
        }
    }

    public function setModule($module) {
        $this->module = $module;
    }

    public function setVersion($version) {
        $this->version = $version;
    }

}
