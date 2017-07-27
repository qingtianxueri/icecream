<?php

namespace sdf\utils;

use sdf\factories\SDFUpdateFactory;
use sdf\exceptions\SDFUpdateException;
use sdf\utils\update\SDFBaseUpdate;

class SDFUpdate {

    private $module;
    private $version;

    /**
     * Update handlers.
     *
     * @var array<SDFBaseUpdate>
     */
    private $updates;

    /**
     * Factory for Update instance.
     *
     * @var SDFUpdateFactory
     */
    private $factory;

    /**
     * Error messages
     *
     * @var array
     */
    private $errors;

    public function __construct($module, $version) {
        $this->module = $module;
        $this->version = $version;
        $this->updates = array();
        $this->errors = array();
        $this->factory = new SDFUpdateFactory();
        $this->factory->setModule($module);
        $this->factory->setVersion($version);
    }

    public function run() {
        foreach ($this->updates as $update) {
            /* @var $update SDFBaseUpdate */
            try {
                if ($update->validate()) {
                    $update->update();
                }
            } catch (SDFUpdateException $e) {
                $this->errors[] = $e->getMessage();
            }
        }
    }

    public function getErrors() {
        return $this->errors;
    }

    public function addUpdate(SDFBaseUpdate $update) {
        $this->updates[] = $update;
    }

    /**
     * Quick function to add update object.
     *
     * @param string $name
     *
     * @return void
     */
    public function addInstance($name) {
        $inst = $this->factory->createUpdate($name);
        $this->addUpdate($inst);
    }

}
